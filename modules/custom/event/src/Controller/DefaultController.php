<?php

namespace Drupal\event\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\event\Event\UserSubscribeEvent;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class DefaultController extends ControllerBase {

    /**
     * @var UserSubscribeEvent
     */
    public $event;

    /**
     * @var EventDispatcherInterface
     */
    public $dispatcher;

    /**
     * DefaultController constructor.
     *
     * @param EventDispatcherInterface $dispatcher
     * @param UserSubscribeEvent $event
     */
    public function __construct(EventDispatcherInterface $dispatcher, UserSubscribeEvent $event) {
        $this->dispatcher = $dispatcher;
        $this->event = $event;
    }

    /**
     * @inheritDoc
     */
    public static function create(ContainerInterface $container)
    {
        return new static(
            $container->get('event_dispatcher')
        );
    }

    public function confirmUserSubscription() {
        // First parameter is Event name, second is Event method.
        $this->dispatcher->dispatch($this->event::NAME, $this->event->getArticle());
    }

}