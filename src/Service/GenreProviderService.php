<?php


namespace App\Service;


use App\Entity\Genre;
use App\Repository\Interfaces\GenreRepositoryInterface;

class GenreProviderService implements GenreProviderServiceInterface
{
    private GenreRepositoryInterface $genreProvider;

    /**
     * GenreProviderService constructor.
     * @param GenreRepositoryInterface $genreProvider
     */
    public function __construct(GenreRepositoryInterface $genreProvider)
    {
        $this->genreProvider = $genreProvider;
    }


    public function getGenre(int $id): ?Genre
    {
        return $this->genreProvider->get($id);
    }

    public function getGenreByName(string $name): ?Genre
    {
        return $this->genreProvider->getByName($name);
    }

    /**
     * @inheritDoc
     */
    public function getGenres(): array
    {
        return $this->genreProvider->getAll();
    }
}
