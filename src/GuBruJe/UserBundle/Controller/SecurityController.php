<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 29/11/14
 * Time: 18:04
 */

namespace GuBruJe\UserBundle\Controller;

use FOS\UserBundle\Controller\SecurityController as BaseController;

/**
 * Class SecurityController
 * @package GuBruJe\UserBundle\Controller
 */
class SecurityController extends BaseController
{
    /**
     * On modifie la façon dont est choisie la vue lors du rendu du formulaire de connexion
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function renderLogin(array $data)
    {
        // Sur la page du formulaire de connexion, on utilise la vue classique "login"
        // Cette vue hérite du layout et ne peut donc être utilisée qu'individuellement
        if ($this->container->get('request')->attributes->get('_route') == 'fos_user_security_login') {
            $view = 'login';
        } else {
            // Mais sinon, il s'agit du formulaire de connexion intégré au menu, on utilise la vue "login_content"
            // car il ne faut pas hériter du layout !
            $view = 'login_content';
        }
        $template = sprintf('FOSUserBundle:Security:%s.html.twig', $view);

        return $this->container->get('templating')->renderResponse($template, $data);
    }
}