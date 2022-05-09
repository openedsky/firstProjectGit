<?php

namespace App\Entity;

use App\Repository\ReleaseRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReleaseRepository::class)
 * @ORM\Table(name="`release`")
 */
class Release
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
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $file;

    /**
     * @ORM\Column(type="integer")
     */
    private $downloads;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePublished;

    /**
     * @ORM\ManyToOne(targetEntity=UserDeco::class, inversedBy="releases")
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

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getFile(): ?string
    {
        return $this->file;
    }

    public function setFile(string $file): self
    {
        $this->file = $file;

        return $this;
    }

    public function getDownloads(): ?int
    {
        return $this->downloads;
    }

    public function setDownloads(int $downloads): self
    {
        $this->downloads = $downloads;

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

    public function getDatePublished(): ?\DateTime
    {
        return $this->datePublished;
    }

    public function setDatePublished(\DateTime $datePublished): self
    {
        $this->datePublished = $datePublished;

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
