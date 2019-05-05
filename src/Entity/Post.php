<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 */
class Post
{

    /**
     * Default list items count
     *
     */
    const NUM_ITEMS = 10;

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
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="posts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $category;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tag", inversedBy="posts")
     * @ORM\JoinTable(
     *      name="posts_tags",
     *      joinColumns={@ORM\JoinColumn(name="post_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="tag_id", referencedColumnName="id")}
     * )
     */
    private $tags;

    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->tags = new ArrayCollection();
        $this->date = new \DateTime();
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
    public function getDate(): ?object
    {
        return $this->date;
    }

    /**
     * Set the value of Date
     *
     * @param string date
     * @return self
     */
    public function setDate($date): self
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
     * Get Post Category
     *
     * @return Category
     */
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    /**
     * Set Post Category
     *
     * @param Category $category
     */
    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get Post Tags
     *
     * @return Collection|Tag[]
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    /**
     * Remove Tag from Post
     *
     * @param Tag $tag
     * @return void
     */
    public function removeTag(Tag $tag): void
    {
        if ($this->tags->contains($tag) === false) {
            return;
        }

        $this->tags->removeElement($tag);
        $tag->removePost($this);
    }

    /**
     * Add Tag to Post
     *
     * @param Tag $tag
     * @return void
     */
    public function addTag(Tag $tag): void
    {
        if ($this->tags->contains($tag) === true) {
            return;
        }

        $this->tags->add($tag);
        $tag->addPost($this);
    }

    /**
     * Convert object to string magic method
     */
    public function __toString()
    {
        return $this->title;
    }
}
