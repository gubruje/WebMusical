<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 31/01/15
 * Time: 19:49
 */

namespace GuBruJe\MusicalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class InformationAdmin extends Admin {
// Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper

            ->add('auteur', 'entity', array('class' => 'GuBruJe\UserBundle\Entity\User'))
            ->add('typeInformation')
            ->add('titre', 'text', array('label' => 'Titre'))
            ->add('contenu') //if no type is specified, SonataAdminBundle tries to guess it
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('titre')
            ->add('auteur')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('titre')
            //->add('slug')
            ->add('auteur')
        ;
    }
} 