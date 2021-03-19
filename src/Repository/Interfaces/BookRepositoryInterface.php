<?php


namespace App\Repository\Interfaces;


use App\Entity\Book;

interface BookRepositoryInterface
{
    /**
     * @return Book[]
     */
    public function getAll(): array;

    public function getByName(string $book): ?Book;

    public function get(int $id): ?Book;
}