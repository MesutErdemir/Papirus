<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=App\Repository\PageRepository::class)
 */
class Page
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
    private $title;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_published;

    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->date = new \DateTime();
    }

    /**
     * Get the value of Id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param int id
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Title
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Set the value of Title
     *
     * @param string title
     * @return self
     */
    public function setTitle($title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of Slug
     *
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * Set the value of Slug
     *
     * @param string slug
     * @return self
     */
    public function setSlug($slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of Content
     *
     * @return string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * Set the value of Content
     *
     * @param string content
     * @return self
     */
    public function setContent($content): self
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get the value of Date
     *
     * @return object
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param string date
     * @return self
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of Is Published
     *
     * @return bool
     */
    public function getIsPublished(): ?bool
    {
        return $this->is_published;
    }

    /**
     * Set the value of Is Published
     *
     * @param bool is_published
     * @return self
     */
    public function setIsPublished($is_published): self
    {
        $this->is_published = $is_published;

        return $this;
    }

    /**
     * Convert object to string magic method
     */
    public function __toString()
    {
        return $this->title;
    }
}
