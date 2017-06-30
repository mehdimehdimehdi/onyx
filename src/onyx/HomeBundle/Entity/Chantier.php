<?php

namespace onyx\HomeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="chantier")
 *
 */

class Chantier {
	
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
     * @return Piece
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

    
}
