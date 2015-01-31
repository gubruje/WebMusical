<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 31/01/15
 * Time: 20:13
 */

namespace GuBruJe\MusicalBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GuBruJe\MusicalBundle\Entity\TypeInformation;

class LoadTypeInformationData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $informationTypes = array('Concert', 'Article', 'Autres');
        foreach($informationTypes as $type){
            $informationType = new TypeInformation();
            $informationType->setNom($type);
            $manager->persist($informationType);
        }

        $manager->flush();
    }
}
