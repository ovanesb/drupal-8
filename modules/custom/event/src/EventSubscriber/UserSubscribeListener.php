<?php

namespace Drupal\event\EventSubscriber;

use Drupal\event\Event\UserSubscribeEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class UserSubscribeListener implements EventSubscriberInterface {

    public static function getSubscribedEvents() {
        return [
            UserSubscribeEvent::NAME => [
                ['onUserSubscribe' => 1000],
                ['onUserHello' => 2000],
                'onGroupUpdate'
            ]
        ];
    }

    public function onUserSubscribe(UserSubscribeEvent $event) {
        // Do something.
        $event->sendEmail();
        $event->getUserAccount();
    }

    public function onUserHello(UserSubscribeEvent $event) {
        // Do something.
        $event->sendEmail();
        $event->getUserAccount();
    }

    public function onGroupUpdate(UserSubscribeEvent $event) {
        // Do something.
        $event->sendEmail();
        $event->getUserAccount();
    }

}