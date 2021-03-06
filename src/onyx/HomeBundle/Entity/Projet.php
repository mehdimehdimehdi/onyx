<?php

namespace onyx\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use onyx\HomeBundle\Entity\Utilisateur;

/**
 *
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="projet")
 */

class Projet {
	
	/**
	 * @ORM\Id()
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue()
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="date")
	 */
	protected $datelivraison;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $hvendues;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $devis;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="projets")
	 */
	protected $user;
	
	/**
	 * @ORM\ManyToOne(targetEntity="EtatsProject", inversedBy="projets")
	 */
	protected $etatprojet;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="DocumentProjet", mappedBy="projet")
	 * @var DocumentProjet[]
	 */
	protected $documents;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Piece", inversedBy="projets")
	 */
	protected $pieces;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Chantier", inversedBy="projets")
	 */
	protected $chantiers;
	
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
	 * Set description
	 *
	 * @param string $description
	 * @return Projet
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		
		return $this;
	}
	
	/**
	 * Get description
	 *
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}
	
	/**
	 * Set datelivraison
	 *
	 * @param \DateTime $datelivraison
	 * @return Projet
	 */
	public function setDatelivraison($datelivraison)
	{
		$this->datelivraison = $datelivraison;
		
		return $this;
	}
	
	/**
	 * Get datelivraison
	 *
	 * @return \DateTime
	 */
	public function getDatelivraison()
	{
		return $this->datelivraison;
	}
	
	/**
	 * Set hvendues
	 *
	 * @param integer $hvendues
	 * @return Projet
	 */
	public function setHvendues($hvendues)
	{
		$this->hvendues = $hvendues;
		
		return $this;
	}
	
	/**
	 * Get hvendues
	 *
	 * @return integer
	 */
	public function getHvendues()
	{
		return $this->hvendues;
	}
	
	/**
	 * Set devis
	 *
	 * @param integer $devis
	 * @return Projet
	 */
	public function setDevis($devis)
	{
		$this->devis = $devis;
		
		return $this;
	}
	
	/**
	 * Get devis
	 *
	 * @return integer
	 */
	public function getDevis()
	{
		return $this->devis;
	}
	
	/**
	 * Set user
	 *
	 * @param \onyx\HomeBundle\Entity\Utilisateur $user
	 * @return Projet
	 */
	public function setUser($user = null)
	{
		$this->user = $user;
		
		return $this;
	}
	
	/**
	 * Get user
	 *
	 * @return \onyx\HomeBundle\Entity\Utilisateur
	 */
	public function getUser()
	{
		return $this->user;
	}
	
	
	
	
	/**
	 * Set etatprojet
	 *
	 * @param \onyx\HomeBundle\Entity\EtatsProject $etatprojet
	 * @return Projet
	 */
	public function setEtatprojet(\onyx\HomeBundle\Entity\EtatsProject $etatprojet = null)
	{
		$this->etatprojet = $etatprojet;
		
		return $this;
	}
	
	/**
	 * Get etatprojet
	 *
	 * @return \onyx\HomeBundle\Entity\EtatsProject
	 */
	public function getEtatprojet()
	{
		return $this->etatprojet;
	}
	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->documents = new \Doctrine\Common\Collections\ArrayCollection();
	}
	
	/**
	 * Add documents
	 *
	 * @param \onyx\HomeBundle\Entity\DocumentProjet $documents
	 * @return Projet
	 */
	public function addDocument(\onyx\HomeBundle\Entity\DocumentProjet $documents)
	{
		$this->documents[] = $documents;
		
		return $this;
	}
	
	/**
	 * Remove documents
	 *
	 * @param \onyx\HomeBundle\Entity\DocumentProjet $documents
	 */
	public function removeDocument(\onyx\HomeBundle\Entity\DocumentProjet $documents)
	{
		$this->documents->removeElement($documents);
	}
	
	/**
	 * Get documents
	 *
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getDocuments()
	{
		return $this->documents;
	}

    /**
     * Add pieces
     *
     * @param \onyx\HomeBundle\Entity\Piece $pieces
     * @return Projet
     */
    public function addPiece(\onyx\HomeBundle\Entity\Piece $pieces)
    {
        $this->pieces[] = $pieces;

        return $this;
    }

    /**
     * Remove pieces
     *
     * @param \onyx\HomeBundle\Entity\Piece $pieces
     */
    public function removePiece(\onyx\HomeBundle\Entity\Piece $pieces)
    {
        $this->pieces->removeElement($pieces);
    }

    /**
     * Get pieces
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPieces()
    {
        return $this->pieces;
    }

    /**
     * Add chantiers
     *
     * @param \onyx\HomeBundle\Entity\Chantier $chantiers
     * @return Projet
     */
    public function addChantier(\onyx\HomeBundle\Entity\Chantier $chantiers)
    {
        $this->chantiers[] = $chantiers;

        return $this;
    }

    /**
     * Remove chantiers
     *
     * @param \onyx\HomeBundle\Entity\Chantier $chantiers
     */
    public function removeChantier(\onyx\HomeBundle\Entity\Chantier $chantiers)
    {
        $this->chantiers->removeElement($chantiers);
    }

    /**
     * Get chantiers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChantiers()
    {
        return $this->chantiers;
    }
}
