<?php

namespace onyx\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;


/**
 *
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="etatprojet")
 */

class EtatsProject {
	
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
	 * @ORM\OneToMany(targetEntity="Projet", mappedBy="etatprojet") 
	 * @var Projet[]
	 */
	protected $projects;

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
     * @return EtatsProject
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
     * Constructor
     */
    public function __construct()
    {
        $this->projects = new ArrayCollection();
    }

    /**
     * Add projects
     *
     * @param \onyx\HomeBundle\Entity\Projet $projects
     * @return EtatsProject
     */
    public function addProject(\onyx\HomeBundle\Entity\Projet $projects)
    {
        $this->projects[] = $projects;

        return $this;
    }

    /**
     * Remove projects
     *
     * @param \onyx\HomeBundle\Entity\Projet $projects
     */
    public function removeProject(\onyx\HomeBundle\Entity\Projet $projects)
    {
        $this->projects->removeElement($projects);
    }

    /**
     * Get projects
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProjects()
    {
        return $this->projects;
    }
}
