<?php

use Application\Application;
use Core\Statera;

/**
 * Sukarix - Just the Right Amount of Sweetness and Efficiency on Top of Fat-Free
 * Copyright (c) RIADVICE SUARL
 * All rights reserved.
 */

// load composer autoload — resolve from project root (works from tools/ or public/statera/)
$projectRoot = realpath(__DIR__ . '/../');
if (!file_exists($projectRoot . '/vendor/autoload.php')) {
    $projectRoot = realpath(__DIR__ . '/../../');
}

require_once $projectRoot . '/vendor/autoload.php';

// Change to application directory to execute the code
chdir(realpath($projectRoot . DIRECTORY_SEPARATOR . 'app'));

$GLOBALS['test_cli'] = PHP_SAPI === 'cli';

// Activate test environment so detectEnvironment() loads config-test.ini and routes-test.ini
// Only set if not already provided via CLI URL params (e.g. ?statera=withCoverage)
$f3 = Base::instance();
if (!$f3->exists('GET.statera')) {
    $f3->set('GET.statera', 'all');
}

Statera::registerGroups();
Statera::startCoverage('Application Bootstrapping');
$app = new Application();
Statera::stopCoverage();
$app->start();
