<?php

namespace GuBruJe\MusicalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Information
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GuBruJe\MusicalBundle\Entity\InformationRepository")
 */
class Information extends Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    
    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="GuBruJe\MusicalBundle\Entity\TypeInformation")
     * @ORM\JoinColumn(nullable=false)
     */
    private $typeInformation;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set typeInformation
     *
     * @param \GuBruJe\MusicalBundle\Entity\TypeInformation $typeInformation
     * @return Information
     */
    public function setTypeInformation(TypeInformation $typeInformation)
    {
        $this->typeInformation = $typeInformation;
        return $this;
    }

    /* Get typeInformation
    *
     * @return \GuBruJeMusicalBundle\Entity\TypeInformation
    */
    public function getTypeInformation()
    {
        return $this->typeInformation;
    }


}
