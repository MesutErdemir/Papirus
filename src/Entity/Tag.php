<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity(repositoryClass=App\Repository\TagRepository::class)
 */
class Tag
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
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Post", mappedBy="tags")
     */
    private $posts;

    /**
     * Constructor method
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
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
     *
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of slug
     *
     * @return string
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * Set the value of slug
     *
     * @param string slug
     *
     * @return self
     */
    public function setSlug($slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Get the value of name
     *
     * @return string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @param string name
     *
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;

        return $this;
    }
    
    /**
     * Get posts belongs to Tag
     *
     * @return Collection|Post[]
     */
    public function getPosts(): Collection
    {
        return $this->posts;
    }

    /**
     * Remove Post from Tag
     *
     * @param Post $post
     * @return void
     */
    public function removePost(Post $post): void
    {
        if ($this->posts->contains($post) === false) {
            return;
        }

        $this->posts->removeElement($post);
        $post->removeTag($this);
    }

    /**
     * Add Post to Tag
     *
     * @param Post $post
     * @return void
     */
    public function addPost(Post $post): void
    {
        if ($this->posts->contains($post) === true) {
            return;
        }

        $this->posts->add($post);
        $post->addTag($this);
    }

    /**
     * Convert object to string magic method
     */
    public function __toString(): string
    {
        return $this->name;
    }
}
