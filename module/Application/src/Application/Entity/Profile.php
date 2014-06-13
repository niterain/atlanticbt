<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Profile
 *
 * @ORM\Table(name="profile", indexes={@ORM\Index(name="profile_ix1", columns={"status"}), @ORM\Index(name="profile_ix2", columns={"address_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="Application\Repository\ProfileRepository")
 */
class Profile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=80, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=80, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="middle_initial", type="string", length=1, nullable=true)
     */
    private $middleInitial;

    /**
     * @var string
     *
     * @ORM\Column(name="contact_phone_number", type="string", length=20, nullable=true)
     */
    private $contactPhoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="email_address", type="string", length=100, nullable=true)
     */
    private $emailAddress;

    /**
     * @var integer
     *
     * @ORM\Column(name="address_id", type="integer", nullable=true)
     */
    private $addressId;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", nullable=false)
     */
    private $status = 'pending';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;



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
     * Set firstName
     *
     * @param string $firstName
     * @return Profile
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return Profile
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set middleInitial
     *
     * @param string $middleInitial
     * @return Profile
     */
    public function setMiddleInitial($middleInitial)
    {
        $this->middleInitial = $middleInitial;

        return $this;
    }

    /**
     * Get middleInitial
     *
     * @return string 
     */
    public function getMiddleInitial()
    {
        return $this->middleInitial;
    }

    /**
     * Set contactPhoneNumber
     *
     * @param string $contactPhoneNumber
     * @return Profile
     */
    public function setContactPhoneNumber($contactPhoneNumber)
    {
        $this->contactPhoneNumber = $contactPhoneNumber;

        return $this;
    }

    /**
     * Get contactPhoneNumber
     *
     * @return string 
     */
    public function getContactPhoneNumber()
    {
        return $this->contactPhoneNumber;
    }

    /**
     * Set emailAddress
     *
     * @param string $emailAddress
     * @return Profile
     */
    public function setEmailAddress($emailAddress)
    {
        $this->emailAddress = $emailAddress;

        return $this;
    }

    /**
     * Get emailAddress
     *
     * @return string 
     */
    public function getEmailAddress()
    {
        return $this->emailAddress;
    }

    /**
     * Set addressId
     *
     * @param integer $addressId
     * @return Profile
     */
    public function setAddressId($addressId)
    {
        $this->addressId = $addressId;

        return $this;
    }

    /**
     * Get addressId
     *
     * @return integer 
     */
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Profile
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Profile
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }
}
