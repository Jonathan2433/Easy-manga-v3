<?php

namespace App\Entity;

use App\Repository\MangasRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    #[ORM\ManyToMany(targetEntity: Authors::class, inversedBy: 'mangas', cascade: ['persist'])]
    private Collection $author;

    #[ORM\ManyToMany(targetEntity: Illustrators::class, inversedBy: 'mangas', cascade: ['persist'])]
    private Collection $illustrator;

    #[ORM\ManyToMany(targetEntity: Genders::class, inversedBy: 'mangas', cascade: ['persist'])]
    private Collection $genders;

    #[ORM\ManyToMany(targetEntity: Type::class, inversedBy: 'mangas', cascade: ['persist'])]
    private Collection $themes;

    public function __construct()
    {
        $this->author = new ArrayCollection();
        $this->illustrator = new ArrayCollection();
        $this->genders = new ArrayCollection();
        $this->themes = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name;
    }

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

    /**
     * @return Collection<int, Authors>
     */
    public function getAuthor(): Collection
    {
        return $this->author;
    }

    public function addAuthor(Authors $author): self
    {
        if (!$this->author->contains($author)) {
            $this->author->add($author);
        }

        return $this;
    }

    public function removeAuthor(Authors $author): self
    {
        $this->author->removeElement($author);

        return $this;
    }

    /**
     * @return Collection<int, Illustrators>
     */
    public function getIllustrator(): Collection
    {
        return $this->illustrator;
    }

    public function addIllustrator(Illustrators $illustrator): self
    {
        if (!$this->illustrator->contains($illustrator)) {
            $this->illustrator->add($illustrator);
        }

        return $this;
    }

    public function removeIllustrator(Illustrators $illustrator): self
    {
        $this->illustrator->removeElement($illustrator);

        return $this;
    }

    /**
     * @return Collection<int, Genders>
     */
    public function getGenders(): Collection
    {
        return $this->genders;
    }

    public function addGender(Genders $gender): self
    {
        if (!$this->genders->contains($gender)) {
            $this->genders->add($gender);
        }

        return $this;
    }

    public function removeGender(Genders $gender): self
    {
        $this->genders->removeElement($gender);

        return $this;
    }

    /**
     * @return Collection<int, Type>
     */
    public function getThemes(): Collection
    {
        return $this->themes;
    }

    public function addTheme(Type $theme): self
    {
        if (!$this->themes->contains($theme)) {
            $this->themes->add($theme);
        }

        return $this;
    }

    public function removeTheme(Type $theme): self
    {
        $this->themes->removeElement($theme);

        return $this;
    }
}
