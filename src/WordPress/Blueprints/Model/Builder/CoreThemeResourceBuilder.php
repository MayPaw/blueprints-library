<?php
/**
 * @file AUTOGENERATED FILE – DO NOT CHANGE MANUALLY
 * All your changes will get overridden. See the README for more details.
 */

namespace WordPress\Blueprints\Model\Builder;

use Swaggest\JsonSchema\Constraint\Properties;
use Swaggest\JsonSchema\Schema;
use WordPress\Blueprints\Model\DataClass\CoreThemeResource;
use Swaggest\JsonSchema\Structure\ClassStructureContract;


/**
 * Built from #/definitions/CoreThemeResource
 */
class CoreThemeResourceBuilder extends CoreThemeResource implements ClassStructureContract
{
    use \Swaggest\JsonSchema\Structure\ClassStructureTrait;

    /**
     * @param Properties|static $properties
     * @param Schema $ownerSchema
     */
    public static function setUpProperties($properties, Schema $ownerSchema)
    {
        $properties->resource = Schema::string();
        $properties->resource->description = "Identifies the file resource as a WordPress Core theme";
        $properties->resource->const = "wordpress.org/themes";
        $properties->slug = Schema::string();
        $properties->slug->description = "The slug of the WordPress Core theme";
        $ownerSchema->type = Schema::OBJECT;
        $ownerSchema->additionalProperties = false;
        $ownerSchema->required = array(
            self::names()->resource,
            self::names()->slug,
        );
        $ownerSchema->setFromRef('#/definitions/CoreThemeResource');
    }

    /**
     * @param string $resource Identifies the file resource as a WordPress Core theme
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    /**
     * @param string $slug The slug of the WordPress Core theme
     * @return $this
     * @codeCoverageIgnoreStart
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
        return $this;
    }
    /** @codeCoverageIgnoreEnd */

    function toDataObject()
    {
        $dataObject = new CoreThemeResource();
        $dataObject->resource = $this->recursiveJsonSerialize($this->resource);
        $dataObject->slug = $this->recursiveJsonSerialize($this->slug);
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