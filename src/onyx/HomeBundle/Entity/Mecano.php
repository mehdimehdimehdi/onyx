<?php

namespace onyx\HomeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * 
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="mecanos")
 *
 */

class Mecano {
	
	/**
	 * @ORM\Id()
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue()
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $nom;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $prenom;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $actif;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $description;
	
	/**
	 * @ORM\Column(type="string")
	 */
	protected $mail;
	
	/**
	 * @ORM\Column(type="integer")
	 */
	protected $tel;
	
		
	/**
	 * @ORM\ManyToOne(targetEntity="TypeMecano", inversedBy="mecanos")
	 */
	protected $typemecano;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Tache", inversedBy="mecanos")
	 */
	protected $taches;
	
	/**
	 * @ORM\ManyToMany(targetEntity="Chantier", inversedBy="mecanos")
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
     * Set nom
     *
     * @param string $nom
     * @return Mecano
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Mecano
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set actif
     *
     * @param integer $actif
     * @return Mecano
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get actif
     *
     * @return integer 
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Mecano
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
     * Set mail
     *
     * @param string $mail
     * @return Mecano
     */
    public function setMail($mail)
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get mail
     *
     * @return string 
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set tel
     *
     * @param integer $tel
     * @return Mecano
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return integer 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set typemecano
     *
     * @param \onyx\HomeBundle\Entity\Typemecanos $typemecano
     * @return Mecano
     */
    public function setTypemecano(TypeMecano $typemecano = null)
    {
        $this->typemecano = $typemecano;

        return $this;
    }

    /**
     * Get typemecano
     *
     * @return \onyx\HomeBundle\Entity\Typemecanos 
     */
    public function getTypemecano()
    {
        return $this->typemecano;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->taches = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add taches
     *
     * @param \onyx\HomeBundle\Entity\Tache $taches
     * @return Mecano
     */
    public function addTach(\onyx\HomeBundle\Entity\Tache $taches)
    {
        $this->taches[] = $taches;

        return $this;
    }

    /**
     * Remove taches
     *
     * @param \onyx\HomeBundle\Entity\Tache $taches
     */
    public function removeTach(\onyx\HomeBundle\Entity\Tache $taches)
    {
        $this->taches->removeElement($taches);
    }

    /**
     * Get taches
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaches()
    {
        return $this->taches;
    }

    /**
     * Add chantiers
     *
     * @param \onyx\HomeBundle\Entity\Chantier $chantiers
     * @return Mecano
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
