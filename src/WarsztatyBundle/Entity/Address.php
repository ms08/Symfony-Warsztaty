<?php

namespace WarsztatyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Address
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="WarsztatyBundle\Repository\AddressRepository")
 */
class Address
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
     * @ORM\Column(name="miasto", type="string", length=255)
     */
    private $miasto;

    /**
     * @var string
     *
     * @ORM\Column(name="ulica", type="string", length=255)
     */
    private $ulica;

    /**
     * @var string
     *
     * @ORM\Column(name="numer_domu", type="string", length=255)
     */
    private $numerDomu;

    /**
     * @var string
     *
     * @ORM\Column(name="numer_mieszkania", type="string", length=255)
     */
    private $numerMieszkania;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="adresy")
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
     * Set miasto
     *
     * @param string $miasto
     * @return Address
     */
    public function setMiasto($miasto)
    {
        $this->miasto = $miasto;

        return $this;
    }

    /**
     * Get miasto
     *
     * @return string
     */
    public function getMiasto()
    {
        return $this->miasto;
    }

    /**
     * Set ulica
     *
     * @param string $ulica
     * @return Address
     */
    public function setUlica($ulica)
    {
        $this->ulica = $ulica;

        return $this;
    }

    /**
     * Get ulica
     *
     * @return string
     */
    public function getUlica()
    {
        return $this->ulica;
    }

    /**
     * Set numerDomu
     *
     * @param string $numerDomu
     * @return Address
     */
    public function setNumerDomu($numerDomu)
    {
        $this->numerDomu = $numerDomu;

        return $this;
    }

    /**
     * Get numerDomu
     *
     * @return string
     */
    public function getNumerDomu()
    {
        return $this->numerDomu;
    }

    /**
     * Set numerMieszkania
     *
     * @param string $numerMieszkania
     * @return Address
     */
    public function setNumerMieszkania($numerMieszkania)
    {
        $this->numerMieszkania = $numerMieszkania;

        return $this;
    }

    /**
     * Get numerMieszkania
     *
     * @return string
     */
    public function getNumerMieszkania()
    {
        return $this->numerMieszkania;
    }

    /**
     * Set user
     *
     * @param \WarsztatyBundle\Entity\User $user
     * @return Address
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
