<?php

namespace GuBruJe\MusicalBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Eko\FeedBundle\Item\Writer\RoutedItemInterface;

/**
 * Annonce
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="GuBruJe\MusicalBundle\Entity\AnnonceRepository")
 */
class Annonce extends Article implements RoutedItemInterface
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

    /**
     * This method returns feed item title
     *
     *
     * @return string
     */
    public function getFeedItemTitle()
    {
        return $this->getTitre();
    }

    /**
     * This method returns feed item description (or content)
     *
     *
     * @return string
     */
    public function getFeedItemDescription()
    {
        return $this->getContenu();
    }


    /**
     * This method returns item publication date
     *
     *
     * @return \DateTime
     */
    public function getFeedItemPubDate()
    {
        return $this->getDate();
    }

    /**
     * This method returns the name of the route
     *
     *
     * @return string
     */
    public function getFeedItemRouteName()
    {
        return 'annonce_show';
    }

    /**
     * This method returns the parameters for the route.
     *
     *
     * @return array
     */
    public function getFeedItemRouteParameters()
    {
        return array('id' => $this->id);
    }

    /**
     * This method returns the anchor to be appended on this item's url
     *
     *
     * @return string The anchor, without the "#"
     */
    public function getFeedItemUrlAnchor()
    {
        // TODO: Implement getFeedItemUrlAnchor() method.
    }


}
