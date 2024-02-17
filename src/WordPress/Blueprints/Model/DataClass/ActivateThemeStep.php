<?php
/**
 * @file AUTOGENERATED FILE – DO NOT CHANGE MANUALLY
 * All your changes will get overridden. See the README for more details.
 */

namespace WordPress\Blueprints\Model\DataClass;

use WordPress\Blueprints\Model\Builder\ProgressBuilder;


class ActivateThemeStep
{
    /** @var ProgressBuilder */
    public $progress;

    /** @var bool */
    public $continueOnError;

    /** @var string */
    public $step = 'activateTheme';

    /** @var string The name of the theme folder inside wp-content/themes/ */
    public $themeFolderName;
}