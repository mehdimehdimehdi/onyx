<?php

namespace onyx\HomeBundle\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="pieces")
 *
 */

class Piece {
	
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
	 * @ORM\Column(type="decimal")
	 */
	protected $achat;
	
	/**
	 * @ORM\Column(type="decimal")
	 */
	protected $vente;
	
		

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


    /**
     * Set achat
     *
     * @param string $achat
     * @return Piece
     */
    public function setAchat($achat)
    {
        $this->achat = $achat;

        return $this;
    }

    /**
     * Get achat
     *
     * @return string 
     */
    public function getAchat()
    {
        return $this->achat;
    }

    /**
     * Set vente
     *
     * @param string $vente
     * @return Piece
     */
    public function setVente($vente)
    {
        $this->vente = $vente;

        return $this;
    }

    /**
     * Get vente
     *
     * @return string 
     */
    public function getVente()
    {
        return $this->vente;
    }
}
