<?php

namespace App\Entity;

use App\Repository\PostRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PostRepository::class)
 */
class Post
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $content;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePublished;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imagePost;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible;

    /**
     * @ORM\ManyToOne(targetEntity=UserDeco::class, inversedBy="posts")
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getDatePublished(): ?\DateTime
    {
        return $this->datePublished;
    }

    public function setDatePublished(\DateTime $datePublished): self
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    public function getImagePost(): ?string
    {
        return $this->imagePost;
    }

    public function setImagePost(?string $imagePost): self
    {
        $this->imagePost = $imagePost;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getIsVisible(): ?bool
    {
        return $this->isVisible;
    }

    public function setIsVisible(bool $isVisible): self
    {
        $this->isVisible = $isVisible;

        return $this;
    }

    public function getAuthor(): ?UserDeco
    {
        return $this->author;
    }

    public function setAuthor(?UserDeco $author): self
    {
        $this->author = $author;

        return $this;
    }
}
