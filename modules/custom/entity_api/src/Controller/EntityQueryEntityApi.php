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

        // Conditions.
        // condition($field, $value = NULL, $operator = NULL, $langcode = NULL);

        // Revoke any type. Bundle of given entity by machine name.
        $query->condition('type', 'article');

        // Get by field vid with value genre.
        $query->condition('vid', 'news');

        // field_tabs IN('nordic_council_of_ministers', 'nordic_council')
        $query->condition('field_color', ['red', 'blue'], 'IN');

        // Apply conditions groups.
        // And
        $group = $query->andConditionGroup()
            ->condition('figures.color', 'red')
            ->condition('figures.shape', 'triangle');
        $query->condition($group);

        $group = $query->andConditionGroup()
            ->condition('figures.color', 'blue')
            ->condition('figures.shape', 'circle');
        $query->condition($group);

        // Or.
        $group = $query->orConditionGroup()
            ->condition('attributes.color', 'red')
            ->condition('attributes.color', 'green');

        $entity_ids = $query
            ->condition('attributes.building_type', 'bikeshed')
            ->condition($group);

        // Note that this particular example can be simplified.
        $entity_ids = $query
            ->condition('attributes.color', ['red', 'green'])
            ->condition('attributes.building_type', 'bikeshed');

        // Start from, length.
        $query->range(0, 100);

        // The result assigned to a variable.
        $result = $query->execute();
    }

}