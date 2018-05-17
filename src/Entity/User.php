<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements AdvancedUserInterface, \Serializable
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45, unique=true)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=254, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->is_active = true;
    }

    /**
     * Get user ID
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername(): ?string
    {
        return $this->username;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return self
     */
    public function setUsername($username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get password salt
     *
     * @return string
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * Get password data
     *
     * @return string
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return self
     */
    public function setPassword($password): self
    {
        if (!empty($password)) {
            $this->password = password_hash($password, PASSWORD_BCRYPT);
        }

        return $this;
    }

    /**
     * Get user email
     *
     * @return string
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * Set user email
     *
     * @param string $email
     * @return self
     */
    public function setEmail($email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get user status is active
     *
     * @return boolean
     */
    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    /**
     * Set user status
     *
     * @param boolean $isActive
     * @return self
     */
    public function setIsActive($isActive): self
    {
      $this->is_active = $isActive;

      return $this;
    }

    /**
     * Get user roles
     *
     * @return array
     */
    public function getRoles(): array
    {
        return array('ROLE_ADMIN');
    }

    /**
     * Get user status
     *
     * @return boolean
     */
    public function isEnabled(): ?bool
    {
        return $this->getIsActive();
    }

    /**
     *
     */
    public function eraseCredentials()
    {

    }

    /**
     *
     */
    public function isAccountNonExpired()
    {
        return true;
    }

    /**
     *
     */
    public function isAccountNonLocked()
    {
        return true;
    }

    /**
     *
     */
    public function isCredentialsNonExpired()
    {
        return true;
    }

    /**
     * Serialize object
     *
     */
    public function serialize()
    {
        return serialize([
            $this->id,
            $this->username,
            $this->password,
        ]);
    }

    /**
     * Unserialize object
     *
     */
    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->username,
            $this->password,
        ) = unserialize($serialized, ['allowed_classes' => false]);
    }
}
