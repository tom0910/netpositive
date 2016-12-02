<?php

namespace AppBundle\EventListener;

use Darsyn\IP\IP;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FacebookFirstIpListener implements EventSubscriberInterface{
    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::RESETTING_RESET_COMPLETED => 'onLoginGetIP'
        ];
    }


    public function onLoginGetIP(GetResponseUserEvent $event) {
        $user = $event->getUser();
        $ip = new IP($event->getRequest()->getClientIp());
        $user->setLastloginclientIp($ip);
    }
}