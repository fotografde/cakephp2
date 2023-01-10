<?php

exec("bash " . __DIR__ . "/test_bootstrap.sh");

ini_set("memory_limit", "512M");

if (!defined('DS')) {
	define('DS', DIRECTORY_SEPARATOR);
}

define('ROOT', dirname(__DIR__));
define('TMP', sys_get_temp_dir() . DS . 'caketest' . DS);
define('LOGS', TMP . 'logs' . DS);
define('CACHE', TMP . 'cache' . DS);
define('SESSIONS', TMP . 'sessions' . DS);

@mkdir(LOGS);
@mkdir(SESSIONS);
@mkdir(CACHE);
@mkdir(CACHE . 'views');
@mkdir(CACHE . 'models');
@mkdir(CACHE . 'persistent');

// other constants that need to be in place during a test run
// which were previously set by the shell bootstrap process
define("CONFIG", __DIR__ . "/app/Config/");
define('CORE_TEST_CASES', __DIR__ . '/lib/Cake/Test/Case');

// bootstrap the framework
require(__DIR__ . "/lib/Cake/Console/ShellDispatcher.php");
$shellDispatcher = new ShellDispatcher([
	__DIR__ . "/Console/cake.php",
	"-working",
	__DIR__,
]);

// tell Cake's autoloader where to find various classes
// we need to do this before PHPUnit autoloads all the test files
App::uses("CakeTestCase", "TestSuite");
App::uses("CakeTestModel", "TestSuite/Fixture");
App::uses("CakeFixtureManager", "TestSuite/Fixture");
App::uses("CakeTestFixture", "TestSuite/Fixture");
App::uses("ClassRegistry", "Utility");
App::uses("AppHelper", "View/Helper");

// initialize the test DB(s)
$_SERVER["DB"] = $_SERVER["DB"] ?? "sqlite";
ClassRegistry::config(['ds' => 'test', 'testing' => true]);
CakeFixtureManager::initialize();

// ensures that PHPUnit's error handler is used during tests
restore_error_handler();
restore_error_handler();
restore_exception_handler();
restore_exception_handler();

// freeze the time
CakeTestCase::time();
