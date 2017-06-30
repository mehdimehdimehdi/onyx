<?php

namespace onyx\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * 
 * @author onyx-dev
 * @ORM\Entity
 * @ORM\Table(name="documentprojet")
 *
 */
class DocumentProjet {
	
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
	 * @ORM\Column(type="string")
	 */
	protected $path;
	
	/**
	 * @ORM\ManyToOne(targetEntity="Projet", inversedBy="documents")
	 */
	protected $projet;

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
     * @return DocumentProjet
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
     * Set path
     *
     * @param string $path
     * @return DocumentProjet
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set projet
     *
     * @param \onyx\HomeBundle\Entity\Projet $projet
     * @return DocumentProjet
     */
    public function setProjet(\onyx\HomeBundle\Entity\Projet $projet = null)
    {
        $this->projet = $projet;

        return $this;
    }

    /**
     * Get projet
     *
     * @return \onyx\HomeBundle\Entity\Projet 
     */
    public function getProjet()
    {
        return $this->projet;
    }
}
