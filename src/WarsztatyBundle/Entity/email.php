<?php

namespace WarsztatyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * email
 *
 * @ORM\Table(name="Email")
 * @ORM\Entity(repositoryClass="WarsztatyBundle\Repository\emailRepository")
 */
class Email
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
     * @ORM\Column(name="adres_emial", type="string", length=255)
     *@Assert\Email
     */
    private $adresEmial;

    /**
     * @var string
     *
     * @ORM\Column(name="typ", type="string", length=255)
     */
    private $typ;

    /**
    * @ORM\ManyToOne(targetEntity="User", inversedBy="emails")
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
     * Set adresEmial
     *
     * @param string $adresEmial
     * @return email
     */
    public function setAdresEmial($adresEmial)
    {
        $this->adresEmial = $adresEmial;

        return $this;
    }

    /**
     * Get adresEmial
     *
     * @return string
     */
    public function getAdresEmial()
    {
        return $this->adresEmial;
    }

    /**
     * Set typ
     *
     * @param string $typ
     * @return email
     */
    public function setTyp($typ)
    {
        $this->typ = $typ;

        return $this;
    }

    /**
     * Get typ
     *
     * @return string
     */
    public function getTyp()
    {
        return $this->typ;
    }

    /**
     * Set user
     *
     * @param \WarsztatyBundle\Entity\User $user
     * @return email
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
