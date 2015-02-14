<?php

namespace GuBruJe\MusicalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GuBruJe\MusicalBundle\Entity\AnnonceRepository")
 */
class Annonce extends Article
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
     * @ORM\OneToMany(targetEntity="GuBruJe\MusicalBundle\Entity\Commentaire", mappedBy="annonce")
     */
    private $commentaires;

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
     * Constructor
     */
    public function __construct()
    {
        $this->commentaires = new ArrayCollection();
    }

    /**
     * Add commentaires
     *
     * @param \GuBruJe\MusicalBundle\Entity\Commentaire $commentaires
     * @return Annonce
     */
    public function addCommentaire(Commentaire $commentaires)
    {
        $this->commentaires[] = $commentaires;

        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \GuBruJe\MusicalBundle\Entity\Commentaire $commentaires
     */
    public function removeCommentaire(Commentaire $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }
}
