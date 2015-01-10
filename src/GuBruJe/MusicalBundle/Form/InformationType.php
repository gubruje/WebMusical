<?php

namespace GuBruJe\MusicalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class InformationType extends ArticleType
{

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
