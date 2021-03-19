<?php


namespace App\Service;


use App\Entity\Book;
use Doctrine\Common\Collections\ArrayCollection;

interface BookProviderServiceInterface
{
    /**
     * @return Book[]
     */
    public function getBooks(): array;

    public function getBookByName(string $name): Book;

    public function getBook(int $id): Book;
}
