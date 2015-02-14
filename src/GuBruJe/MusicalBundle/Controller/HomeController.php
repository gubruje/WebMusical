<?php

namespace GuBruJe\MusicalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * Page d'accueil de l'application
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        $em = $this->getDoctrine();
        $informations = $em->getRepository('GuBruJeMusicalBundle:Information')->findValideInformations(3);
        $annonces = $em->getRepository('GuBruJeMusicalBundle:Annonce')->findValideAnnonces(3);
        return $this->render('GuBruJeMusicalBundle:Home:index.html.twig', array(
            'informations' => $informations,
            'annonces' => $annonces,
            'oeuvres'  => array()
        ));
    }
}
