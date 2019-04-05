<?php

namespace Drupal\entity_api\Controller;

use Drupal\Core\Controller\ControllerBase;

class EntityQueryEntityApi extends ControllerBase {

    /**
     * entityQuery
     */
    public function EntityQuery() {

        // Get any entity type.
        // node, block, taxonomy_term, comments, user etc.
        $query = \Drupal::entityQuery('node');

        // Revoke any type. Bundle of given entity by machine name.
        $query->condition('type', 'article');

        // Get by field vid with value genre.
        $query->condition('vid', 'genre');

        // field_tabs IN('nordic_council_of_ministers', 'nordic_council')
        $query->condition('field_tabs', ['nordic_council_of_ministers', 'nordic_council'], 'IN');

        $result = $query->execute();
    }

}