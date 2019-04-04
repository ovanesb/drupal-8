<?php

namespace Drupal\plugin\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a Sandwich annotation object.
 *
 * @see \Drupal\plugin\HumanPluginManager
 * @see plugin_api
 *
 * Note that the "@ Annotation" line below is required and should be the last
 * line in the docblock. It's used for discovery of Annotation definitions.
 *
 * @Annotation
 */
class Human extends Plugin {

    /**
     * The plugin ID.
     *
     * @var string
     */
    public $id;

    /**
     * A brief, human readable, description of the human type.
     *
     * This property is designated as being translatable because it will appear
     * in the user interface. This provides a hint to other developers that they
     * should use the Translation() construct in their annotation when declaring
     * this property.
     *
     * @var \Drupal\Core\Annotation\Translation
     *
     * @ingroup plugin_translatable
     */
    public $description;

    /**
     * Ability that can be added to that human type.
     *
     * This property is a mixed value, so we indicate that to other developers
     * who are writing annotations for a Human plugin.
     *
     * @var mixed
     */
    public $ability;

}
