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
use GuBruJe\MusicalBundle\Entity\Rubrique;

class LoadRubriqueData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $rubriques = array('Musiciens', 'Cours', 'Achat/Vente', 'Divers');
        foreach($rubriques as $nom){
            $rubrique = new Rubrique();
            $rubrique->setNom($nom);

            $this->addReference($nom, $rubrique);

            $manager->persist($rubrique);
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
     return 1;
    }


}
