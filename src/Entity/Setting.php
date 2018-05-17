<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SettingRepository")
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $key;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $value;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : true})
     */
    private $is_secure;

    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->is_secure = true;
    }

    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param int $id
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Key
     *
     * @return string
     */
    public function getKey(): ?string
    {
        return $this->key;
    }

    /**
     * Set the value of Key
     *
     * @param string $key
     * @return self
     */
    public function setKey($key): self
    {
        $this->key = $key;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return self
     */
    public function setValue($value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of Is Secure
     *
     * @return bool
     */
    public function getIsSecure(): ?bool
    {
        return $this->is_secure;
    }

    /**
     * Set the value of Is Secure
     *
     * @param bool $is_secure
     * @return self
     */
    public function setIsSecure($is_secure): self
    {
        $this->is_secure = $is_secure;

        return $this;
    }

}
