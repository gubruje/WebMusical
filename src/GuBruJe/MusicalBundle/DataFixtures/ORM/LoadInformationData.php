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
use GuBruJe\MusicalBundle\Entity\TypeInformation;

class LoadInformationData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $informations = array(
            array(
                'titre' => 'Concert de M.X',
                'contenu' => 'Un excellent artiste à ne pas manquer.',
                'type' => 'Concert',
                'auteur' => 'member',
                'statut' => 'Valide',
            ),
            array(
                'titre' => 'Mon premier article',
                'contenu' => 'Ceci est mon tout premier article soyez sympa ...',
                'type' => 'Article',
                'auteur' => 'member',
                'statut' => 'En attente',
            ),
            array(
                'titre' => 'Autre Késako',
                'contenu' => 'Voilà quelquechose que l\on peut mettre dans la catégorie Autres',
                'type' => 'Autres',
                'auteur' => 'admin',
                'statut' => 'Valide',
            ),
            array(
                'titre' => 'Article',
                'contenu' => 'Mon article en tant qu\'administrateur c\est génial',
                'type' => 'Article',
                'auteur' => 'admin',
                'statut' => 'En attente',
            ),


        );
        foreach ($informations as $detail) {
            $information = new Information();
            $information->setTitre($detail['titre']);
            $information->setContenu($detail['contenu']);
            $information->setTypeInformation($this->getReference($detail['type']));
            $information->setAuteur($this->getReference($detail['auteur']));
            $information->setStatut($this->getReference($detail['statut']));

            $manager->persist($information);
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
        return 4;
    }


}
