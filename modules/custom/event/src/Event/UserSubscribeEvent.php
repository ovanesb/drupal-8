<?php

namespace Drupal\event\Event;

use Symfony\Component\EventDispatcher\Event;

/**
 * Class UserSubscribeEvent
 *
 * @package Drupal\event\Event
 */
class UserSubscribeEvent extends Event {

    const NAME = 'send.event';

    public function sendEmail() {
        // Do something.
    }

    public function getUserAccount() {
        // Do something.
    }
}