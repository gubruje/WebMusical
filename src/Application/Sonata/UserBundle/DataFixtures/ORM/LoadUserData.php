<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 31/01/15
 * Time: 20:13
 */

namespace GuBruJe\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Sonata\UserBundle\Entity\User;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
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
            array(
                'username' => 'member',
                'mail' => 'member.mail@mymail.com',
                'pass' => 'member',
                'admin' => false,
                'roles' => array('ROLE_MEMBER')
            ),

        );

        foreach($users as $u){
            $user = new User();
            $user->setUsername($u['username']);
            $user->setEmail($u['mail']);
            $user->setPlainPassword($u['pass']);
            $user->setEnabled(true);
            $user->setSuperAdmin((Boolean) $u['admin']);
            if(isset($u['roles'])){
                $user->setRoles($u['roles']);
            }

            $this->addReference($u['username'], $user);

            $manager->persist($user);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder() {
        return 1;
    }
}
