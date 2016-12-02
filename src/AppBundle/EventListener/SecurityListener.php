<?php

namespace AppBundle\EventListener;

use Darsyn\IP\IP;
use FOS\UserBundle\Model\UserManagerInterface;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;
use AppBundle\Entity\User;

class SecurityListener {

    protected $userManager;

    public function __construct(UserManagerInterface $userManager){
        $this->userManager = $userManager;
    }

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        $username = $event->getAuthenticationToken()->getUsername();
        $email= "vmi@g.com";
        $user_f = $this->userManager->findUserByUsername($username);
        if ($user_f === null) {
            //when facebook login is first persists to database

        } else {
            $user_f = $this->userManager->findUserByUsername($username);
            $ip = new IP($event->getRequest()->getClientIp());
            $user_f->setLastloginclientIp($ip);
            $this->userManager->updateUser($user_f);
        }
    }
}