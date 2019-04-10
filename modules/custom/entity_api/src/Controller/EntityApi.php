<?php

namespace Drupal\entity_api\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class NodeEntityApi
 *
 * Provide examples for the following operation:
 *  - Create
 *  - Load
 *  - Delete
 *  - Update
 *  - Save
 *  - Check
 *  - Create alias
 *
 * @package Drupal\entity_api\Controller
 */
class EntityApi extends ControllerBase {

    /**
     * Check methods.
     */
    public function EntityCheck() {
        // Load node storage.
        $entity = $this->entityTypeManager->getStorage('node');

        // Make sure that an object is an entity.
        if ($entity instanceof \Drupal\Core\Entity\EntityInterface) { }

        // Make sure it's a content entity.
        if ($entity instanceof \Drupal\Core\Entity\ContentEntityInterface) { }

        // Make sure it's a content entity.
        if ($entity->getEntityType()->getGroup() == 'content') { }

        // Make sure it's a node.
        if ($entity instanceof \Drupal\node\NodeInterface) { }

        // Using entityType() works better when the needed entity type is dynamic.
        $needed_type = 'node';
        if ($entity->getEntityTypeId() == $needed_type) { }
    }

    /**
     * Load methods.
     */
    public function EntityLoad() {
        // Load node storage.
        $entity = $this->entityTypeManager->getStorage('node');

        // Load entity of type node by node id nid.
        $entity->load(1);

        // Load multiple entities of type node by array of node ids nids
        $entity->loadMultiple([1,2,3,4,5]);

        // Load entity of type node by given property criteria.
        $entity->loadByProperties(['title' => 'Node title', 'type' => 'content_type_name']);
    }

    /**
     * Get information from an entity/ Entity methods
     */
    public function EntityGet() {

        // Load node storage.
        $entity = $this->entityTypeManager->getStorage('node')->load(1);

        // Get the ID.
        $entity->id();

        // Get the bundle.
        $entity->bundle();

        // Check if the entity is new.
        $entity->isNew();

        // Get the label of an entity. Replacement for entity_label().
        $entity->label();

        // Get the URL object for an entity.
        $entity->toUrl();

        // Get internal path, path alias if exists, for an entity.
        $entity->toUrl()->toString();

        // Get entity reference target id
        $entity->vocabulary->target_id;

        // Get value.
        $entity->title->value;

        // Create a duplicate that can be saved as a new entity.
        $duplicate = $entity->createDuplicate();
    }

    /**
     * Delete node.
     */
    public function EntityCreate() {
        $entity = $this->entityTypeManager->getStorage('node');
        $entity->create([
            'uuid' => '572d019d-3169-4b19-8380-1eb3faf5e7f8',
            'uid' => 1,
            'title' => 'My node title',
            'field_description' => [[
                'value' => 'Page Description.',
                'format' => 'basic_html',
            ],
            ],
            'type' => 'content_type_name',
            'status' => 1
        ]);
        $entity->save();
    }

    /**
     * Delete node.
     */
    public function EntityDelete() {
        // Delete a single entity.
        $entity = $this->entityTypeManager->getStorage('node')->load(1);
        $entity->delete();


        // Delete multiple entities at once.
        $controller = $this->entityTypeManager->getStorage('node');

        $entities = $controller->loadMultiple([1, 2, 3, 4]);
        $controller->delete($entities);
    }

    /**
     * Save node.
     */
    public function EntitySave() {
        $entity = $this->entityTypeManager->getStorage('node')->load(1);

        // To save an entity.
        $entity->save();
    }

    /**
     * Set field to a node.
     */
    public function EntitySetField() {
        $entity = $this->entityTypeManager->getStorage('node')->load(1);

        // Set title filed.
        $entity->set('title', "Some value");

        // Set body field.
        $entity->set('body', array(
            'summary' => "I am summary",
            'value' => "And whole text goes in here...",
            'format' => 'basic_html',
        ));

        $entity->save();
    }
}
