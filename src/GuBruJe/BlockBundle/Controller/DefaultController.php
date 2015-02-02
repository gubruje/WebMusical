<?php

namespace GuBruJe\BlockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('GuBruJeBlockBundle:Default:index.html.twig', array('name' => $name));
    }
}
