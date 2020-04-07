<?php

declare(strict_types=1);

namespace App\EventListener;

use eZ\Publish\Core\MVC\Symfony\View\Event\FilterViewParametersEvent;
use eZ\Publish\Core\MVC\Symfony\View\ViewEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddViewTypeEventListener implements EventSubscriberInterface
{
    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * @return array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ViewEvents::FILTER_VIEW_PARAMETERS => 'addViewTypeParameter',
        ];
    }

    /**
     * Injects the used view type into the content view template.
     *
     * @param \eZ\Publish\Core\MVC\Symfony\View\Event\FilterViewParametersEvent $event
     */
    public function addViewTypeParameter(FilterViewParametersEvent $event): void
    {
        $event->getParameterBag()->set(
            'view_type',
            $event->getView()->getViewType()
        );
    }
}
