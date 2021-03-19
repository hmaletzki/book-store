<?php


namespace App\Repository\Interfaces;


use App\Entity\Genre;

interface GenreRepositoryInterface
{
    /**
     * @return Genre[]
     */
    public function getAll(): array;

    public function getByName(string $genre): ?Genre;

    public function get(int $id): ?Genre;
}
