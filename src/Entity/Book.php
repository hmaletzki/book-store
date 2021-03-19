<?php

namespace App\Entity;

use App\Entity\Traits\ReadableByRoleTrait;
use App\Repository\BookRepository;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class representing a book
 *
 * @ORM\Entity(repositoryClass=BookRepository::class)
 */
class Book
{
    use ReadableByRoleTrait;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private ?int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private ?string $name;

    /**
     * @ORM\Column(type="date")
     */
    private ?DateTimeInterface $releaseDate;

    /**
     * @ORM\Column(type="integer")
     */
    private ?int $length;

    /**
     * @var ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="Genre", inversedBy="books")
     * @ORM\JoinTable(name="books_genres")
     */
    private ArrayCollection $genres;

    /**
     * Book constructor.
     */
    public function __construct()
    {
        $this->genres = new ArrayCollection();
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

    public function getReleaseDate(): ?DateTimeInterface
    {
        return $this->releaseDate;
    }

    public function setReleaseDate(DateTimeInterface $releaseDate): self
    {
        $this->releaseDate = $releaseDate;

        return $this;
    }

    public function getLength(): ?int
    {
        return $this->length;
    }

    public function setLength(int $length): self
    {
        $this->length = $length;

        return $this;
    }

    public function addGenre(Genre $genre): void
    {
        if ($this->genres->contains($genre)) {
            return;
        }

        $genre->addBook($this);
        $this->genres[] = $genre;
    }

    public function removeGenre(Genre $genre): void
    {
        $this->genres->removeElement($genre);
    }

    public function getGenres(): ArrayCollection
    {
        return $this->genres;
    }
}
