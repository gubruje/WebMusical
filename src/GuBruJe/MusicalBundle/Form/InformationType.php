<?php

namespace GuBruJe\MusicalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformationType extends ArticleType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('typeInformation');
        parent::buildForm($builder, $options);
        //TODO ajouter le typeInformation dans le formulaire

    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'GuBruJe\MusicalBundle\Entity\Information'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'gubruje_musicalbundle_information';
    }
}
