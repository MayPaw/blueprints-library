<?php
/**
 * @file AUTOGENERATED FILE – DO NOT CHANGE MANUALLY
 * All your changes will get overridden. See the README for more details.
 */

namespace WordPress\Blueprints\Model\Builder;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Schema;
use WordPress\Blueprints\Model\DataClass\InstallThemeStep;
use Swaggest\JsonSchema\Structure\ClassStructureContract;


/**
 * Built from #/definitions/InstallThemeStep
 */
class InstallThemeStepBuilder extends InstallThemeStep implements ClassStructureContract
{
    use \Swaggest\JsonSchema\Structure\ClassStructureTrait;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->progress = ProgressBuilder::schema();
        $properties->continueOnError = Schema::boolean();
        $properties->continueOnError->default = false;
        $properties->step = Schema::string();
        $properties->step->description = "The step identifier.";
        $properties->step->const = "installTheme";
        $properties->themeZipFile = new Schema();
        $properties->themeZipFile->anyOf[0] = Schema::string();
        $properties->themeZipFile->anyOf[1] = FilesystemResourceBuilder::schema();
        $properties->themeZipFile->anyOf[2] = InlineResourceBuilder::schema();
        $properties->themeZipFile->anyOf[3] = CoreThemeResourceBuilder::schema();
        $properties->themeZipFile->anyOf[4] = CorePluginResourceBuilder::schema();
        $properties->themeZipFile->anyOf[5] = UrlResourceBuilder::schema();
        $properties->themeZipFile->setFromRef('#/definitions/FileReference');
        $properties->activate = Schema::boolean();
        $properties->activate->description = "Whether to activate the theme after installing it.";
        $properties->activate->default = true;
        $ownerSchema->type = Schema::OBJECT;
        $ownerSchema->additionalProperties = false;
        $ownerSchema->required = array(
            self::names()->step,
            self::names()->themeZipFile,
        );
        $ownerSchema->setFromRef('#/definitions/InstallThemeStep');
    }

    /**
     * @param ProgressBuilder $progress
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setProgress(ProgressBuilder $progress)
    {
        $this->progress = $progress;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param bool $continueOnError
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setContinueOnError($continueOnError)
    {
        $this->continueOnError = $continueOnError;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $step The step identifier.
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setStep($step)
    {
        $this->step = $step;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string|FilesystemResourceBuilder|InlineResourceBuilder|CoreThemeResourceBuilder|CorePluginResourceBuilder|UrlResourceBuilder $themeZipFile
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setThemeZipFile($themeZipFile)
    {
        $this->themeZipFile = $themeZipFile;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param bool $activate Whether to activate the theme after installing it.
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setActivate($activate)
    {
        $this->activate = $activate;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    function toDataObject()
    {
        $dataObject = new InstallThemeStep();
        $dataObject->progress = $this->recursiveJsonSerialize($this->progress);
        $dataObject->continueOnError = $this->recursiveJsonSerialize($this->continueOnError);
        $dataObject->step = $this->recursiveJsonSerialize($this->step);
        $dataObject->themeZipFile = $this->recursiveJsonSerialize($this->themeZipFile);
        $dataObject->activate = $this->recursiveJsonSerialize($this->activate);
        return $dataObject;
    }

    /**
     * @param mixed $objectMaybe
     */
    private function recursiveJsonSerialize($objectMaybe)
    {
        if ( is_array( $objectMaybe ) ) {
        	return array_map([$this, 'recursiveJsonSerialize'], $objectMaybe);
        } elseif ( $objectMaybe instanceof \Swaggest\JsonSchema\Structure\ClassStructureContract ) {
        	return $objectMaybe->toDataObject();
        } else {
        	return $objectMaybe;
        }
    }
}