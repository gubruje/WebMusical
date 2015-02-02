<?php

namespace GuBruJe\MusicalBundle\Entity;

use Application\Sonata\UserBundle\Entity\User;
use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 *
 * @ORM\MappedSuperclass
 */
abstract class Article
{

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="contenu", type="text")
     */
    private $contenu;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="Application\Sonata\UserBundle\Entity\User")
     *
     */
    private $auteur;

    /**
     * @var
     * @ORM\ManyToOne(targetEntity="GuBruJe\MusicalBundle\Entity\Statut")
     *
     */
    private $statut;

    public function __construct()
    {
        $this->date = new \DateTime();
    }
    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Article
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @return Information
     */
    public function setAuteur(User $auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get user
     *
     */
    public function getAuteur()
    {
        return $this->auteur;
    }


    /**
     * Set statut
     *
     * @param \GuBruJe\MusicalBundle\Entity\Statut $statut
     * @return Article
     */
    public function setStatut(Statut $statut = null)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return \GuBruJe\MusicalBundle\Entity\Statut 
     */
    public function getStatut()
    {
        return $this->statut;
    }
}
