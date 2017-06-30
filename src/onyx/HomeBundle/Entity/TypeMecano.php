<?php

namespace onyx\HomeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 *
 * @author onyx-dev
 * @ORM\Entity()
 * @ORM\Table(name="typemecanos")
 */

class TypeMecano {
	
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
	 * @ORM\OneToMany(targetEntity="Mecano", mappedBy="typemecano") 
	 * @var Mecano[]
	 */
	protected $mecnao;

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mecnao = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return TypeMecano
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
     * Add mecnao
     *
     * @param \onyx\HomeBundle\Entity\Mecano $mecnao
     * @return TypeMecano
     */
    public function addMecnao(\onyx\HomeBundle\Entity\Mecano $mecnao)
    {
        $this->mecnao[] = $mecnao;

        return $this;
    }

    /**
     * Remove mecnao
     *
     * @param \onyx\HomeBundle\Entity\Mecano $mecnao
     */
    public function removeMecnao(\onyx\HomeBundle\Entity\Mecano $mecnao)
    {
        $this->mecnao->removeElement($mecnao);
    }

    /**
     * Get mecnao
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMecnao()
    {
        return $this->mecnao;
    }
}
