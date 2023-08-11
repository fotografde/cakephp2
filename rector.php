<?php

declare(strict_types=1);

use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\LevelSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Php71\Rector\FuncCall\CountOnNullRector;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Php55\Rector\String_\StringClassNameToClassConstantRector;

return static function (RectorConfig $rectorConfig): void {

	$rectorConfig->paths([
//		__DIR__ . '/app',
		__DIR__ . '/lib/Cake',
//		__DIR__ . '/plugins',
	]);

	$rectorConfig->parallel(360, 8);

	// DEFINE RULES (Single & Sets)
	// Rule Overview: https://github.com/rectorphp/rector/blob/main/docs/rector_rules_overview.md
	// Register a single rule
//    $rectorConfig->rule(InlineConstructorDefaultToPropertyRector::class);

	// Register sets of rules
	$rectorConfig->sets([

		// DONE
//		SetList::PHP_70,
//		SetList::PHP_71,
//		SetList::PHP_72,
//		SetList::PHP_73,

		// PHP5x + PHP70,1,2,3
		LevelSetList::UP_TO_PHP_82,

//		PHPUnitSetList::PHPUNIT_60,
//		PHPUnitSetList::PHPUNIT_70,
//		PHPUnitSetList::PHPUNIT_80,
//		PHPUnitSetList::PHPUNIT_90,
//		PHPUnitSetList::PHPUNIT_91,
	]);

	// Skip Rules in Folders https://github.com/rectorphp/rector/blob/main/docs/how_to_ignore_rule_or_paths.md
	$rectorConfig->skip([
		CountOnNullRector::class,
		StringClassNameToClassConstantRector::class,
		__DIR__ . '/app/Test/Case/ModelTestRunFirst/data',
        __DIR__ . '/lib/Cake/Test',
	]);

	$rectorConfig->autoloadPaths([
		//		// it seems that if we set this option, it doesn't autoload PhpUnit, so we add it back in
		__DIR__ . "/vendor/autoload.php",

//		// bootstrap stuff like Cake constants
		__DIR__ . "/rector_bootstrap.php",

		// we can't just give it the Cake directory because there are some ambiguous classes
		// e.g. there is a real AppShell and a version in the console templates dir
		__DIR__ . "/lib/Cake/Cache/",
		__DIR__ . "/lib/Cake/Config/",
		__DIR__ . "/lib/Cake/Configure/",

		__DIR__ . "/lib/Cake/Console/Command/",
		__DIR__ . "/lib/Cake/Console/Helper/",
		__DIR__ . "/lib/Cake/Console/ConsoleErrorHandler.php",
		__DIR__ . "/lib/Cake/Console/ConsoleInput.php",
		__DIR__ . "/lib/Cake/Console/ConsoleInputArgument.php",
		__DIR__ . "/lib/Cake/Console/ConsoleInputOption.php",
		__DIR__ . "/lib/Cake/Console/ConsoleInputSubcommand.php",
		__DIR__ . "/lib/Cake/Console/ConsoleOptionParser.php",
		__DIR__ . "/lib/Cake/Console/ConsoleOutput.php",
		__DIR__ . "/lib/Cake/Console/HelpFormatter.php",
		__DIR__ . "/lib/Cake/Console/Shell.php",
		__DIR__ . "/lib/Cake/Console/ShellDispatcher.php",
		__DIR__ . "/lib/Cake/Console/TaskCollection.php",

		__DIR__ . "/lib/Cake/Controller/",
		__DIR__ . "/lib/Cake/Core/",
		__DIR__ . "/lib/Cake/Error/",
		__DIR__ . "/lib/Cake/Event/",
		__DIR__ . "/lib/Cake/I18n/",
		__DIR__ . "/lib/Cake/Log/",
		__DIR__ . "/lib/Cake/Model/",
		__DIR__ . "/lib/Cake/Network/",
		__DIR__ . "/lib/Cake/Routing/",

		__DIR__ . "/lib/Cake/Test/Case",
		__DIR__ . "/lib/Cake/Test/Case/Console/Command/BakeShellTest.php",
		__DIR__ . "/lib/Cake/Test/Case/Console/Command/Task/ControllerTaskTest.php",
		__DIR__ . "/lib/Cake/Test/Fixture",

		__DIR__ . "/lib/Cake/TestSuite/",

		__DIR__ . "/lib/Cake/Utility/",
		__DIR__ . "/lib/Cake/View/",
	]);
};
