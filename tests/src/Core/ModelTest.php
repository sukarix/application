<?php

declare(strict_types=1);

namespace Core;

use DB\Cortex;
use Sukarix\Models\Model;
use Sukarix\Models\User;
use Test\Scenario;

/**
 * @internal
 *
 * @coversNothing
 */
final class ModelTest extends Scenario
{
    protected $group = 'Model Layer';

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testModelInstantiation($f3)
    {
        $test = $this->newTest();
        $user = new User();
        $test->expect($user instanceof Model, 'User model extends Model');
        $test->expect($user instanceof Cortex, 'User model extends Cortex');
        $test->expect('users' === $user->getTable(), 'User model table is "users"');
        $test->expect(method_exists($user, 'loadById'), 'Model has loadById utility method');
        $test->expect(method_exists($user, 'execQuery'), 'Model has execQuery utility method');

        return $test->results();
    }

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testUserMethods($f3)
    {
        $test = $this->newTest();
        $user = new User();
        $test->expect(method_exists($user, 'getByEmail'), 'User has getByEmail method');
        $test->expect(method_exists($user, 'emailExists'), 'User has emailExists method');
        $test->expect(method_exists($user, 'usernameExists'), 'User has usernameExists method');
        $test->expect(method_exists($user, 'verifyPassword'), 'User has verifyPassword method');
        $test->expect(method_exists($user, 'getUsersByUsernameOrEmail'), 'User has getUsersByUsernameOrEmail method');

        return $test->results();
    }

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testModelUtilityMethods($f3)
    {
        $test = $this->newTest();
        $user = new User();
        $test->expect(method_exists($user, 'execScalar'), 'Model has execScalar method');
        $test->expect(method_exists($user, 'recordExists'), 'Model has recordExists method');
        $test->expect(method_exists($user, 'countRecords'), 'Model has countRecords method');
        $test->expect(method_exists($user, 'toArray'), 'Model has toArray method');
        $test->expect(method_exists($user, 'hasChanges'), 'Model has hasChanges method');

        return $test->results();
    }

    /**
     * @param $f3 \Base
     *
     * @return array
     */
    public function testPasswordHashing($f3)
    {
        $test           = $this->newTest();
        $user           = new User();
        $user->password = 'testPassword123';
        $test->expect('testPassword123' !== $user->password, 'Password is hashed on set');
        $test->expect(true === $user->verifyPassword('testPassword123'), 'Password verification succeeds with correct password');
        $test->expect(false === $user->verifyPassword('wrongPassword'), 'Password verification fails with wrong password');

        return $test->results();
    }
}
