<?php

namespace GuBruJe\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('GuBruJeCoreBundle:Home:index.html.twig');
    }
}
