<?php

namespace Drupal\plugin;

use Drupal\Component\Plugin\PluginBase;

/**
 * Provides \Drupal\plugin\HumanBase.
 *
 * This is a helper class which makes it easier for other developers to
 * implement human plugins in their own modules. In HumanBase we provide
 * some generic methods for handling tasks that are common to pretty much all
 * human plugins. Thereby reducing the amount of boilerplate code required to
 * implement a human plugin.
 *
 * In this case both the description and calories properties can be read from
 * the @Human annotation. In most cases it is probably fine to just use that
 * value without any additional processing. However, if an individual plugin
 * needed to provide special handling around either of these things it could
 * just override the method in that class definition for that plugin.
 *
 * We intentionally declare our base class as abstract, and skip the order()
 * method required by \Drupal\plugin\HumanInterface. This way
 * even if they are using our base class, developers will always be required to
 * define an order() method for their custom human type.
 *
 * @see \Drupal\plugin\Annotation\Human
 * @see \Drupal\plugin\HumanInterface
 */
abstract class HumanBase extends PluginBase implements HumanInterface {

    /**
     * Retrieve the @description property from the annotation and return it.
     *
     * @return string
     */
    public function description() {
        return $this->pluginDefinition['description'];
    }

    /**
     * Retrieve the @ability property from the annotation and return it.
     *
     * @return string
     */
    public function colour() {
        return $this->pluginDefinition['colour'];
    }
}
