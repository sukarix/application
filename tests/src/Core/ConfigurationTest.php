<?php

declare(strict_types=1);

namespace Core;

use Sukarix\Configuration\Environment;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class ConfigurationTest extends Scenario
{
    protected $group = 'Framework Configuration';

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testDefaultConfiguration($f3)
    {
        $test = $this->newTest();
        $test->expect('UTC' === date_default_timezone_get(), 'Timezone set to UTC');
        $test->expect('UTF-8' === \ini_get('default_charset'), 'Default charset is UTF-8');
        $test->expect('../logs/' === $f3->get('LOGS'), 'Logs folder correctly configured');
        $test->expect('../tmp/' === $f3->get('TEMP'), 'Cache folder correctly configured');
        $test->expect('en-GB' === $f3->get('FALLBACK'), 'Fallback language set to en-GB');
        $test->expect(true === $f3->get('SECURITY.csrf.enabled'), 'CSRF protection enabled');
        $test->expect(3600 === (int) $f3->get('SECURITY.csrf.expiry'), 'CSRF expiry set to 3600 seconds');
        $test->expect('Sukarix\Core\Session' === $f3->get('classes.session'), 'Session class mapped correctly');
        $test->expect('\Access' === $f3->get('classes.access'), 'Access class mapped correctly');
        $test->expect('Sukarix\Helpers\I18n' === $f3->get('classes.i18n'), 'I18n class mapped correctly');
        $test->expect('Sukarix\Helpers\Assets' === $f3->get('classes.assets'), 'Assets class mapped correctly');
        $test->expect('Sukarix\Helpers\HTML' === $f3->get('classes.html'), 'HTML class mapped correctly');
        $test->expect('Sukarix\Mail\MailSender' === $f3->get('classes.mailer'), 'Mailer class mapped correctly');
        $test->expect('Sukarix\Notification\Notifier' === $f3->get('classes.notifier'), 'Notifier class mapped correctly');

        return $test->results();
    }

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testEnvironmentDetection($f3)
    {
        $test = $this->newTest();
        $test->expect(
            Environment::isProduction() || Environment::isTest(),
            'Environment is either production or test'
        );
        $test->expect(
            \in_array($f3->get('application.environment'), ['test', 'production', 'development'], true),
            'Application environment config key is set to a valid value'
        );

        return $test->results();
    }
}
