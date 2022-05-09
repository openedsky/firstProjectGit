<?php

namespace App\Entity;

use App\Repository\SlideRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SlideRepository::class)
 */
class Slide
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subTitle;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subTitle2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imageSlide;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=UserDeco::class, inversedBy="slides")
     */
    private $author;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datePublished;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVisible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $slidePosition;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ButtonText1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonLink1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonText2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonLink2;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSubTitle(): ?string
    {
        return $this->subTitle;
    }

    public function setSubTitle(?string $subTitle): self
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    public function getSubTitle2(): ?string
    {
        return $this->subTitle2;
    }

    public function setSubTitle2(?string $subTitle2): self
    {
        $this->subTitle2 = $subTitle2;

        return $this;
    }

    public function getImageSlide(): ?string
    {
        return $this->imageSlide;
    }

    public function setImageSlide(string $imageSlide): self
    {
        $this->imageSlide = $imageSlide;

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

    public function getAuthor(): ?UserDeco
    {
        return $this->author;
    }

    public function setAuthor(?UserDeco $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getDatePublished(): ?\DateTimeInterface
    {
        return $this->datePublished;
    }

    public function setDatePublished(\DateTimeInterface $datePublished): self
    {
        $this->datePublished = $datePublished;

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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getSlidePosition(): ?string
    {
        return $this->slidePosition;
    }

    public function setSlidePosition(?string $slidePosition): self
    {
        $this->slidePosition = $slidePosition;

        return $this;
    }

    public function getButtonText1(): ?string
    {
        return $this->ButtonText1;
    }

    public function setButtonText1(?string $ButtonText1): self
    {
        $this->ButtonText1 = $ButtonText1;

        return $this;
    }

    public function getButtonLink1(): ?string
    {
        return $this->buttonLink1;
    }

    public function setButtonLink1(?string $buttonLink1): self
    {
        $this->buttonLink1 = $buttonLink1;

        return $this;
    }

    public function getButtonText2(): ?string
    {
        return $this->buttonText2;
    }

    public function setButtonText2(?string $buttonText2): self
    {
        $this->buttonText2 = $buttonText2;

        return $this;
    }

    public function getButtonLink2(): ?string
    {
        return $this->buttonLink2;
    }

    public function setButtonLink2(?string $buttonLink2): self
    {
        $this->buttonLink2 = $buttonLink2;

        return $this;
    }
}
