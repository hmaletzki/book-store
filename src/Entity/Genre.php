<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection
     * @ORM\ManyToMany(targetEntity="Book", mappedBy="genres")
     * @ORM\JoinTable(name="books_genres")
     */
    private $books;

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

        $this->books[] = $book;
    }

    public function removeBook(Book $book): void
    {
        $this->books->removeElement($book);
    }

    public function getBooks(): ArrayCollection
    {
        return $this->books;
    }
}
