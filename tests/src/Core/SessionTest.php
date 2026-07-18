<?php

declare(strict_types=1);

namespace Core;

use Sukarix\Core\Session;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class SessionTest extends Scenario
{
    protected $group = 'Session Management';

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testSessionInstance($f3)
    {
        $test    = $this->newTest();
        $session = \Registry::get('session');
        $test->expect($session instanceof Session, 'Session instance is available in Registry');
        $test->expect(method_exists($session, 'isLoggedIn'), 'Session has isLoggedIn method');
        $test->expect(method_exists($session, 'getRole'), 'Session has getRole method');
        $test->expect(method_exists($session, 'generateToken'), 'Session has generateToken method');
        $test->expect(method_exists($session, 'validateToken'), 'Session has validateToken method');

        return $test->results();
    }

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testCsrfTokenGeneration($f3)
    {
        $test    = $this->newTest();
        $session = \Registry::get('session');
        $token   = $session->generateToken();
        $test->expect(!empty($token), 'CSRF token is generated');
        $test->expect($token === $session->get('csrf_token'), 'CSRF token is stored in session');
        $test->expect(true === $session->get('csrf_valid'), 'CSRF valid flag is set after generation');

        return $test->results();
    }

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testUserLoginState($f3)
    {
        $test    = $this->newTest();
        $session = \Registry::get('session');
        $test->expect(false === $session->isLoggedIn(), 'User is not logged in by default');
        $test->expect('' === $session->getRole(), 'User role is empty by default');

        return $test->results();
    }
}
