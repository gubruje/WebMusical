<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 31/01/15
 * Time: 20:13
 */

namespace GuBruJe\MusicalBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use GuBruJe\MusicalBundle\Entity\Information;
use GuBruJe\MusicalBundle\Entity\Statut;
use GuBruJe\MusicalBundle\Entity\TypeInformation;

class LoadStatutData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $statuts = array('Valide', 'Invalide', 'En attente');

        foreach ($statuts as $nom) {
            $statut = new Statut();
            $statut->setNom($nom);

            $this->addReference($nom, $statut);

            $manager->persist($statut);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    function getOrder()
    {
        return 3;
    }


}
