<?php

declare(strict_types=1);

namespace Core;

use Suite\ConfigurationTest;
use Suite\ModelTest;
use Suite\SessionTest;
use Sukarix\Statera as SukarixStatera;

class Statera extends SukarixStatera
{
    public static function registerGroups(): void
    {
        self::setGroups([
            ConfigurationTest::class,
            SessionTest::class,
            ModelTest::class,
        ]);
    }
}

class Map
{
    public function get(): void {}

    public function post(): void {}
}
