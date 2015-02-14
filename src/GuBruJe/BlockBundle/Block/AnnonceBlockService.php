<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 02/02/15
 * Time: 16:01
 */

namespace GuBruJe\BlockBundle\Block;

use Doctrine\ORM\EntityManager;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\BlockBundle\Block\BaseBlockService;
use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Model\BlockInterface;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Security\Core\SecurityContext;

class AnnonceBlockService extends BaseBlockService{

    protected $em;
    protected $securityContext;

    public function __construct($name, EngineInterface $templating, EntityManager $em, SecurityContext $securityContext)
    {
        parent::__construct($name, $templating);

        $this->em = $em;
        $this->securityContext = $securityContext;
    }


    public function setDefaultSettings(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'title'    => 'Mes Annonces',
            'template' => 'GuBruJeBlockBundle:Block:block_annonce.html.twig',
        ));
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
        $formMapper->add('settings', 'sonata_type_immutable_array', array(
            'keys' => array(
                array('title', 'text', array('required' => false)),
            )
        ));
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
        $errorElement
            ->with('settings.title')
            ->assertNotNull(array())
            ->assertNotBlank()
            ->assertMaxLength(array('limit' => 50))
            ->end();
    }

    public function execute(BlockContextInterface $blockContext, Response $response = null)
    {
        // merge settings
        $settings = $blockContext->getSettings();
        $user = $this->securityContext->getToken()->getUser();

        $annonceManger = $this->em->getRepository('GuBruJeMusicalBundle:Annonce');
        $annonces = $annonceManger->findByAuteur($user);

        return $this->renderResponse($blockContext->getTemplate(), array(
            'annonces'     => $annonces,
            'block'     => $blockContext->getBlock(),
            'settings'  => $settings
        ), $response);
    }
} 