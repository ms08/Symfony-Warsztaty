<?php

namespace WarsztatyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Grupa
 *
 * @ORM\Table(name="grupa")
 * @ORM\Entity(repositoryClass="WarsztatyBundle\Repository\GrupaRepository")
 */
class Grupa
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
    * @ORM\ManyToMany(targetEntity="User", mappedBy="groups")
    */
    private $users;
    public function __construct()
    {
      $this->users = new ArrayCollection();
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
     * Add users
     *
     * @param \WarsztatyBundle\Entity\User $users
     * @return Grupa
     */
    public function addUser(\WarsztatyBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \WarsztatyBundle\Entity\User $users
     */
    public function removeUser(\WarsztatyBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }
}
