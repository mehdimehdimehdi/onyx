<?php

namespace onyx\HomeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="taches")
 *
 */

class Tache {
	
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
	 * @ORM\Column(type="integer")
	 */
	protected $minutes;
	
	/**
	 * @ORM\Column(type="decimal")
	 */
	protected $heures;
	
	/**
	 * @ORM\Column(type="date")
	 */
	protected $date;
	
	
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
     * @return Tache
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
     * Set minutes
     *
     * @param integer $minutes
     * @return Tache
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;

        return $this;
    }

    /**
     * Get minutes
     *
     * @return integer 
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set heures
     *
     * @param string $heures
     * @return Tache
     */
    public function setHeures($heures)
    {
        $this->heures = $heures;

        return $this;
    }

    /**
     * Get heures
     *
     * @return string 
     */
    public function getHeures()
    {
        return $this->heures;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Tache
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

    
}
