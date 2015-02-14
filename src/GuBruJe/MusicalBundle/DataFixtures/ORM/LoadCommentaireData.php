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
use GuBruJe\MusicalBundle\Entity\Commentaire;
use GuBruJe\MusicalBundle\Entity\Information;
use GuBruJe\MusicalBundle\Entity\Statut;
use GuBruJe\MusicalBundle\Entity\TypeInformation;

class LoadCommentaireData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $commentaires = array(
            array(
                'commentaire' => "Mirabilis abnoba acceleratrix carpseriss uria est. Cum lura credere, omnes finises attrahendam alter, peritus burguses.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Cum tabes observare, omnes ususes experientia ferox, domesticus tataes. Accelerare virtualiter ducunt ad germanus quadra.",
                'user' => 'member',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Awareness happens when you develop life so harmoniously that whatsoever you are contacting is your blessing.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Pius luna sensim locuss glos est. Cum usus messis, omnes pulchritudinees experientia festus, bi-color seculaes.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Pol, a bene domus, historia! Lotus, bassus nuclear vexatum iaceres diligenter pugna de camerarius, domesticus abnoba.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "The ascension of your afterlifes will shine solitary when you remember that hypnosis is the guru.",
                'user' => 'member',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Cum repressor volare, omnes cannabises convertam regius, nobilis barcases. Barcass sunt valebats de fidelis extum.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Fortiss sunt decors de bi-color plasmator. Cum nuclear vexatum iacere peregrinatione, omnes homoes fallere salvus, festus brodiumes.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Sunt orgiaes fallere audax, azureus nutrixes. Raptus, alter lacteas satis talem de placidus, camerarius genetrix.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Heu, gabalium! Raptus, superbus compaters mechanice aperto de rusticus, secundus omnia. Eras nocere, tanquam fatalis hilotae.",
                'user' => 'member',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Classis secundus olla est. Zeta moris, tanquam domesticus deus. Detriuss sunt imbers de neuter solem.",
                'user' => 'admin',
                'annonce' => 'Annonce0',
                'ip' => '78.142.203.68',
                //annonce 17
            ),array(
                'commentaire' => "Nunquam convertam vox. Hercle, cannabis salvus!, spatii! Azureus, festus ventuss sed mire promissio de domesticus, bi-color zelus.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '72.85.253.45',
            ),array(
                'commentaire' => "Index moris, tanquam noster bursa. Altus, bi-color cliniass recte magicae de ferox, pius ventus.",
                'user' => 'admin',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Contencios sunt caniss de lotus elevatus. Cum lacta studere, omnes castores visum salvus, castus tabeses.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Est flavum bursa, cesaris. Vortex de fidelis frondator, experientia hilotae! Sunt indictioes dignus magnum, germanus brabeutaes.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '72.85.253.45',
            ),array(
                'commentaire' => "Fortis xiphias aliquando dignuss era est. Azureus, bi-color nixuss virtualiter quaestio de emeritis, albus frondator.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Lapsus de fatalis zirbus, aperto rumor! Ferox, altus gabaliums cito visum de clemens, flavum habena.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '72.85.253.45',
            ),array(
                'commentaire' => "Quadras sunt ionicis tormentos de bassus scutum. Cum victrix velum, omnes quadraes quaestio neuter, ferox deuses.",
                'user' => 'admin',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Nunquam experientia advena. Cur abactus accelerare? Cum orexis potus, omnes calceuses contactus castus, bassus armariumes.",
                'user' => 'admin',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "Ecce. Heu, teres racana! A falsis, mens nobilis sectam. Brodiums sunt paluss de mirabilis calceus.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '72.85.253.45',
            ),array(
                'commentaire' => "Heu, torquis! Turpiss mori in antenna! Teres, fidelis advenas aliquando carpseris de lotus, dexter rector.",
                'user' => 'admin',
                'annonce' => 'Annonce1',
                'ip' => '72.85.253.45',
            ),array(
                'commentaire' => "Racanas persuadere in fatalis vierium! Cum genetrix favere, omnes lunaes captis grandis, brevis zetaes.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "The extend of your advices will die cheerfully when you absorb that energy is the power.",
                'user' => 'admin',
                'annonce' => 'Annonce1',
                'ip' => '78.142.203.68',
            ),array(
                'commentaire' => "A falsis, mortem lotus glos. Neuter, salvus hippotoxotas recte anhelare de altus, regius armarium.",
                'user' => 'member',
                'annonce' => 'Annonce1',
                'ip' => '72.85.253.45',
            ),
        );

        foreach ($commentaires as $detail) {
            $commentaire = new Commentaire();
            $commentaire->setContenu($detail['commentaire']);
            $commentaire->setUser($this->getReference($detail['user']));
            $commentaire->setAnnonce($this->getReference($detail['annonce']));
            $commentaire->setIp($detail['ip']);

            $manager->persist($commentaire);
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
