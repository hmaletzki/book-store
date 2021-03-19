<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\ManyToMany(targetEntity="Book", mappedBy="genres")
     * @ORM\JoinTable(name="books_genres")
     */
    private Collection $books;

    /**
     * Genre constructor.
     */
    public function __construct()
    {
        $this->books = new ArrayCollection();
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

    public function addBook(Book $book): void
    {
        if ($this->books->contains($book)) {
            return;
        }

        $this->books->add($book);
    }

    public function removeBook(Book $book): void
    {
        $this->books->removeElement($book);
    }

    public function getBooks(): Collection
    {
        return $this->books;
    }
}
