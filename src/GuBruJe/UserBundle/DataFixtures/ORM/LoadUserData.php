<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 31/01/15
 * Time: 20:13
 */

namespace GuBruJe\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GuBruJe\UserBundle\Entity\User;

class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $users = array(
            array(
                'username' => 'admin',
                'mail' => 'admin.mail@mymail.com',
                'pass' => 'admin',
                'admin' => true,
            ),
        );

        foreach($users as $u){
            $user = new User();
            $user->setUsername($u['username']);
            $user->setEmail($u['mail']);
            $user->setPlainPassword($u['pass']);
            $user->setEnabled(true);
            $user->setSuperAdmin((Boolean) $u['admin']);

            $manager->persist($user);
        }

        $manager->flush();
    }
}
