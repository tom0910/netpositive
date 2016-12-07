<?php

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class Builder extends ContainerBuilder
{
    public function topMenu(FactoryInterface $factory, array $options)
    {


        $menu = $factory->createItem('root');
//        $menu->setChildrenAttribute('class', 'nav navbar-top-linksnavbar-right');
//
//        // Create a dropdown with a caret
//        $dropdown = $menu->addChild('', array(
//            'icon' => 'user',
//            'dropdown' => true,
//            'caret' => true,
//            'label' => 'user'
//        ));
//        // Create a dropdown header
//        $dropdown->addChild('Wel Welcome', array('route' => 'homepage'));
//        $dropdown->addChild('Edit Profile', array('route' => 'fos_user_profile_edit'));
//        $dropdown->addChild('Change Password', array('route' => 'fos_user_change_password'));
//        $dropdown->addChild('Logout', array('route' => 'fos_user_security_logout'));
        return $menu;
    }
}
