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
        $articles = array(
            array('title' => 'titre 1',
                  'contenu' => 'test paragraphe 1',
                  
                ),
            array('title' => 'titre 2',
                  'contenu' => 'test paragraphe 2',
                  
                ),
            array('title' => 'titre 3',
                  'contenu' => 'test paragraphe 3',
                  
                )
        );
        return $this->render('GuBruJeMusicalBundle:Home:index.html.twig', array(
            'articles' => $articles,
        ));
    }
}
