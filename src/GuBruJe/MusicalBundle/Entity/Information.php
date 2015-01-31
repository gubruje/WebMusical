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
     * @var
     * @ORM\ManyToOne(targetEntity="GuBruJe\UserBundle\Entity\User")
     *
     */
    private $user;


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
     * Set user
     *
     * @param \GuBruJe\UserBundle\Entity\User $user
     * @return Information
     */
    public function setUser(\GuBruJe\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \GuBruJe\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
