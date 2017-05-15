<?php

namespace WarsztatyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="WarsztatyBundle\Repository\UserRepository")
 */
class User
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=255)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="info", type="text")
     */
    private $info;

    /**
    * @ORM\OneToMany(targetEntity="Telefon", mappedBy="user")
    */
      private $numbers;
    /**
    * @ORM\OneToMany(targetEntity="email", mappedBy="user")
      */
      private $emails;
    /**
    * @ORM\OneToMany(targetEntity="Address", mappedBy="user")
    */
    private $adresy;


    /**
    * @ORM\ManyToMany(targetEntity="Grupa", inversedBy="users")
    * @ORM\JoinTable(name="users_groups")
    */

    private $groups;

    public function __construct()
    {
      $this->numbers = new ArrayCollection();
      $this->emails = new ArrayCollection();
      $this->adresy = new ArrayCollection();
      $this->groups = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set info
     *
     * @param string $info
     * @return User
     */
    public function setInfo($info)
    {
        $this->info = $info;

        return $this;
    }

    /**
     * Get info
     *
     * @return string
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * Add numbers
     *
     * @param \WarsztatyBundle\Entity\Telefon $numbers
     * @return User
     */
    public function addNumber(\WarsztatyBundle\Entity\Telefon $numbers)
    {
        $this->numbers[] = $numbers;

        return $this;
    }

    /**
     * Remove numbers
     *
     * @param \WarsztatyBundle\Entity\Telefon $numbers
     */
    public function removeNumber(\WarsztatyBundle\Entity\Telefon $numbers)
    {
        $this->numbers->removeElement($numbers);
    }

    /**
     * Get numbers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumbers()
    {
        return $this->numbers;
    }

    /**
     * Add groups
     *
     * @param \WarsztatyBundle\Entity\Grupa $groups
     * @return User
     */
    public function addGroup(\WarsztatyBundle\Entity\Grupa $groups)
    {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param \WarsztatyBundle\Entity\Grupa $groups
     */
    public function removeGroup(\WarsztatyBundle\Entity\Grupa $groups)
    {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }


    /**
     * Add emails
     *
     * @param \WarsztatyBundle\Entity\Email $emails
     * @return User
     */
    public function addEmail(\WarsztatyBundle\Entity\Email $emails)
    {
        $this->emails[] = $emails;

        return $this;
    }

    /**
     * Remove emails
     *
     * @param \WarsztatyBundle\Entity\Email $emails
     */
    public function removeEmail(\WarsztatyBundle\Entity\Email $emails)
    {
        $this->emails->removeElement($emails);
    }

    /**
     * Get emails
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmails()
    {
        return $this->emails;
    }

    /**
     * Add adresy
     *
     * @param \WarsztatyBundle\Entity\Address $adresy
     * @return User
     */
    public function addAdresy(\WarsztatyBundle\Entity\Address $adresy)
    {
        $this->adresy[] = $adresy;

        return $this;
    }

    /**
     * Remove adresy
     *
     * @param \WarsztatyBundle\Entity\Address $adresy
     */
    public function removeAdresy(\WarsztatyBundle\Entity\Address $adresy)
    {
        $this->adresy->removeElement($adresy);
    }

    /**
     * Get adresy
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdresy()
    {
        return $this->adresy;
    }
}
