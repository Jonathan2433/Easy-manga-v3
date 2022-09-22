<?php

namespace App\Entity;

use App\Repository\MangasRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MangasRepository::class)]
class Mangas
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $img = null;

    #[ORM\Column(nullable: true)]
    private ?int $chapters = null;

    #[ORM\Column(nullable: true)]
    private ?int $volumes = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $published = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $synopsis = null;

    #[ORM\Column]
    private ?int $id_api = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column]
    private ?bool $is_for_adult = null;

    #[ORM\Column]
    private ?bool $is_categorize = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function getChapters(): ?int
    {
        return $this->chapters;
    }

    public function setChapters(int $chapters): self
    {
        $this->chapters = $chapters;

        return $this;
    }

    public function getVolumes(): ?int
    {
        return $this->volumes;
    }

    public function setVolumes(?int $volumes): self
    {
        $this->volumes = $volumes;

        return $this;
    }

    public function getPublished(): ?string
    {
        return $this->published;
    }

    public function setPublished(string $published): self
    {
        $this->published = $published;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(?string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getIdApi(): ?int
    {
        return $this->id_api;
    }

    public function setIdApi(int $id_api): self
    {
        $this->id_api = $id_api;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function isIsForAdult(): ?bool
    {
        return $this->is_for_adult;
    }

    public function setIsForAdult(bool $is_for_adult): self
    {
        $this->is_for_adult = $is_for_adult;

        return $this;
    }

    public function isIsCategorize(): ?bool
    {
        return $this->is_categorize;
    }

    public function setIsCategorize(bool $is_categorize): self
    {
        $this->is_categorize = $is_categorize;

        return $this;
    }
}
