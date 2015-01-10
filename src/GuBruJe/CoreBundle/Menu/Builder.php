<?php
/**
 * User: jeremy
 * Date: 29/11/14
 * Time: 15:21
 */

namespace GuBruJe\CoreBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

class Builder extends ContainerAware
{
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');

        $menu->addChild('Home', array('route' => 'homepage'));
        $annoncesItem = $menu->addChild('Annonces', array('uri' => '#'));
        $annoncesItem->addChild('Information', array('route' => 'information'));
        // ... add more children

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername();
        $menu = $factory->createItem('root');

        $user = $menu->addChild('user', array('uri' => '#','label' => '.icon-user '.$username));
        $user->addChild('Mon compte', array('route' => 'fos_user_profile_show'));
        $user->addChild('logout', array('route' => 'fos_user_security_logout', 'label' => 'layout.logout'))->setExtra('translation_domain', 'FOSUserBundle');;
        // ... add more children

        return $menu;
    }
}