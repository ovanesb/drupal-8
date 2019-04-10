<?php

namespace Drupal\entity_api\Controller;

use Drupal\Core\Controller\ControllerBase;

class NodeEntity extends ControllerBase {

    /**
     * Create alias to a node.
     */
    public function NodeAliasCreate() {
        $storage = \Drupal::service('path.alias_storage');
        $source = '/node/1';

        // Delete if exists. And you want to change it.
        $storage->delete(['source' => $source, 'language', 'langcode' => 'en']);
        $storage->save($source, '/my-path', 'en');
    }

}
