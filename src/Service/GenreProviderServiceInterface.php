<?php


namespace App\Service;


use App\Entity\Genre;

interface GenreProviderServiceInterface
{
    public function getGenre(int $id): ?Genre;

    public function getGenreByName(string $name): ?Genre;

    /**
     * @return Genre[]
     */
    public function getGenres(): array;
}