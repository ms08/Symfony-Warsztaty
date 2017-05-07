<?php

namespace WarsztatyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Telefon
 *
 * @ORM\Table(name="telefon")
 * @ORM\Entity(repositoryClass="WarsztatyBundle\Repository\TelefonRepository")
 */
class Telefon
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="numer_telefonu", type="string", length=255, unique=false)
     */
    private $numerTelefonu;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="numbers")
    * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
    */
    private $user;


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
     * Set numerTelefonu
     *
     * @param string $numerTelefonu
     * @return Telefon
     */
    public function setNumerTelefonu($numerTelefonu)
    {
        $this->numerTelefonu = $numerTelefonu;

        return $this;
    }

    /**
     * Get numerTelefonu
     *
     * @return string
     */
    public function getNumerTelefonu()
    {
        return $this->numerTelefonu;
    }

    /**
     * Set user
     *
     * @param \WarsztatyBundle\Entity\User $user
     * @return Telefon
     */
    public function setUser(\WarsztatyBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \WarsztatyBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
