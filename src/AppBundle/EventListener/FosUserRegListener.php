<?php

namespace AppBundle\EventListener;

use Darsyn\IP\IP;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\GetResponseUserEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class FosUserRegListener implements EventSubscriberInterface{


    public static function getSubscribedEvents()
    {
        return [
            FOSUserEvents::REGISTRATION_INITIALIZE => 'onLoginGetFbIP'
        ];
    }


    public function onLoginGetFbIP(GetResponseUserEvent $event) {
        $user = $event->getUser();
        $ip = new IP($event->getRequest()->getClientIp());
        $user->setLastloginclientIp($ip);
    }
}
