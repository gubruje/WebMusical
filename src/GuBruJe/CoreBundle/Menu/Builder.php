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
        $menu->setChildrenAttribute('class', 'nav navbar-nav');

        $annoncesItem = $menu->addChild('Annonces', array('uri' => '#'))
        ->setAttribute('dropdown', true);
        $annoncesItem->addChild('Information', array('route' => 'information'));
        // ... add more children

        return $menu;
    }

    public function userMenu(FactoryInterface $factory, array $options)
    {
        $username = $this->container->get('security.context')->getToken()->getUser()->getUsername();
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav navbar-right');


        $user = $menu->addChild('user', array('uri' => '#','label' => $username))
            ->setAttribute('dropdown', true)
            ->setAttribute('icon', 'fa fa-user');
        $user->addChild('Mon compte', array('route' => 'fos_user_profile_show'));
        $user->addChild('logout', array('route' => 'fos_user_security_logout', 'label' => 'Deconnexion'));
        // ... add more children

        return $menu;
    }
}