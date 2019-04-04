<?php

/**
 * @file
 * Provides \Drupal\plugin\HumanInterface.
 *
 * When defining a new plugin type you need to define an interface that all
 * plugins of the new type will implement. This ensures that consumers of the
 * plugin type have a consistent way of accessing the plugin's functionality. It
 * should include access to any public properties, and methods for accomplishing
 * whatever business logic anyone accessing the plugin might want to use.
 *
 * For example, an image manipulation plugin might have a "process" method that
 * takes a known input, probably an image file, and returns the processed
 * version of the file.
 *
 * In our case we'll define methods for accessing the human readable description
 * of a human and the number of calories per serving. As well as a method for
 * ordering a human.
 */

namespace Drupal\plugin;


interface HumanInterface {

    /**
     * Provide a description of the human.
     *
     * @return string
     *   A string description of the human.
     */
    public function description();

    /**
     * Provide the number of calories per serving for the human.
     *
     * @return float
     *   The number of calories per serving.
     */
    public function colour();

    /**
     * @param array $extras
     *   An array of extra ingredients to include with this human.
     *
     * @return mixed
     */
    public function ability(array $extras);
}
