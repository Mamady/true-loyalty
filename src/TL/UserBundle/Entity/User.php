<?php

namespace TL\UserBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo; // gedmo annotations

use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Validator\Constraints as Assert;
use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser
{

//    use TimestampableEntity;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var $title
     *
     * @ORM\Column(name="title", type="string", length=8)
     */
    protected $title;

    /**
     * @var $firstName
     *
     * @ORM\Column(name="first_name", type="string", length=100, nullable=false)
     * @Assert\Length(min="2",minMessage="tl_user.first_name.short")
     */
    protected $firstName;

    /**
     * @var $lastName
     *
     * @ORM\Column(name="last_name", type="string", length=100)
     * @Assert\Length(min="2",minMessage="tl_user.last_name.short")
     */
    protected $lastName;

    /**
     * @var $website
     *
     * @ORM\Column(name="website", type="string", length=200, nullable=true)
     */
    protected $website;

    /**
     * @var $company
     *
     * @ORM\Column(name="company", type="string", length=200)
     */
    protected $company;

    /**
     * @var $address1
     *
     * @ORM\Column(name="address1", type="string", length=100, nullable=true)
     */
    protected $address1;

    /**
     * @var $address2
     *
     * @ORM\Column(name="address2", type="string", length=100, nullable=true)
     */
    protected $address2;

    /**
     * @var $city
     *
     * @ORM\Column(name="city", type="string", length=8, nullable=true)
     */
    protected $city;

    /**
     * @var $postcode
     *
     * @ORM\Column(name="postcode", type="string", length=8, nullable=true)
     */
    protected $postcode;

    /**
     * @var $country
     *
     * @ORM\Column(name="country", type="string", length=30)
     */
    protected $country;

    /**
     * @var $phone
     *
     * @ORM\Column(name="phone", type="string", length=30, nullable=true)
     */
    protected $phone;

    /**
     * @var DateTime $createdAt
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime", name="created_at")
     */
    protected $createdAt;

    /**
     * @var DateTime $updatedAt
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime", name="updated_at", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var $verified
     *
     * @ORM\Column(name="verified", type="boolean", nullable=true)
     */
    protected $verified;

    /**
     * @var $plan
     *
     * @ORM\Column(name="plan", type="string", length=100, nullable=true)
     */
    protected $plan;

    /**
     * @var $code
     *
     * @ORM\Column(name="code", type="string", length=100, nullable=true)
     */
    protected $code;

    public function __construct()
    {
        parent::__construct();
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
     * Set title
     *
     * @param string $title
     * @return User
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
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
     * @return User
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
     * Set website
     *
     * @param string $website
     * @return User
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set company
     *
     * @param string $company
     * @return User
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set address1
     *
     * @param string $address1
     * @return User
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;

        return $this;
    }

    /**
     * Get address1
     *
     * @return string
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     * @return User
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;

        return $this;
    }

    /**
     * Get address2
     *
     * @return string
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return User
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set postcode
     *
     * @param string $postcode
     * @return User
     */
    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }

    /**
     * Get postcode
     *
     * @return string
     */
    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return User
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return User
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set verified
     *
     * @param boolean $verified
     * @return User
     */
    public function setVerified($verified)
    {
        $this->verified = $verified;

        return $this;
    }

    /**
     * Get verified
     *
     * @return boolean
     */
    public function getVerified()
    {
        return $this->verified;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return User
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get plan
     *
     * @return string
     */
    public function getPlan()
    {
        return $this->plan;
    }


    /**
     * Set plan
     *
     * @param string $plan
     * @return User
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;

        return $this;
    }

    public function setEmail($email)
    {
        parent::setEmail($email);

        $this->setUsername($email);

        return $this;
    }


    public function setEmailCanonical($emailCanonical){

        $this->emailCanonical = $emailCanonical;
        $this->usernameCanonical = $emailCanonical;

        return $this;
    }


}
