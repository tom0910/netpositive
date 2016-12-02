<?php
namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as FOSUBUser;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Type;
use Darsyn\IP\IP;
use Gedmo\Mapping\Annotation as Gedmo;

Type::addType('ip', 'Darsyn\IP\Doctrine\IpType');

/**
 * @ORM\Table(name="users")
 * @ORM\Entity
 *
 * @ORM\AttributeOverrides({
 *      @ORM\AttributeOverride(name="lastLogin",
 *          column=@ORM\Column(
 *              name     = "last_login_datetime",
 *              type     = "datetime",
 *              nullable = true
 *          )
 *      )
 * })
 */
class User extends FOSUBUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    protected $id;

    /**
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    private $facebookId;

    /**
     * @ORM\Column(name="facebook_access_token", type="string", length=255, nullable=true)
     */

    private $facebookAccessToken;

    /**
     * @ORM\Column(type="string",nullable=true)
     */
    protected $full_name;

    /**
     * @ORM\Column(type="phone_number", nullable=true)
     */
    protected $phone;

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
        parent::setUsername($full_name);
    }


    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $facebookId
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * @return string
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param string $facebookAccessToken
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * @return string
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    public function __construct()
    {
        parent::__construct();
        $this->username = uniqid();
    }

    public function setEmail($email)
    {
        parent::setEmail($email);
        if ($this->getFullName()===null) {
            parent::setUsername($email);
        }
    }

    /**
     * @ORM\Column(type="ip",nullable=true)
     */
    protected $last_login_client_ip;

    public function getLastloginclientIp()
    {
        return $this->last_login_client_ip;
    }

    public function setLastloginclientIp(IP $ip)
    {
        $this->last_login_client_ip = $ip;
    }

    /**
     * @ORM\Column(type="datetime")
     * @Gedmo\Timestampable(on="create")
     */
    protected $create_datetime;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @Gedmo\Timestampable(on="update")
     */
    protected $update_datetime;

    /**
     * Set create_datetime
     *
     * @param \DateTime $create_datetime
     *
     * @return User
     */
    public function setCreateDatetime($create_datetime)
    {
        $this->create_datetime = $create_datetime;

        return $this;
    }

    /**
     * Get create_datetime
     *
     * @return \DateTime
     */
    public function getCreateDatetime()
    {
        return $this->create_datetime;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $update_datetime
     *
     * @return User
     */
    public function setUpdatedatetime($update_datetime)
    {
        $this->update_datetime = $update_datetime;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedatetime()
    {
        return $this->update_datetime;
    }

}