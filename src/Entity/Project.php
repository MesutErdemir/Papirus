<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=App\Repository\ProjectRepository::class)
 */
class Project
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $summary;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_published;

    /**
     * Get value of id
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of url
     */ 
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */ 
    public function setUrl(string $url): self
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of summary
     */ 
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set the value of summary
     *
     * @return  self
     */ 
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of is_published
     */ 
    public function getIsPublished()
    {
        return $this->is_published;
    }

    /**
     * Set the value of is_published
     *
     * @return  self
     */ 
    public function setIsPublished($is_published)
    {
        $this->is_published = $is_published;

        return $this;
    }
}
