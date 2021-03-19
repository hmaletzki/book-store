<?php

namespace App\Repository;

use App\Entity\Genre;
use App\Repository\Interfaces\GenreRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Genre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Genre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Genre[]    findAll()
 * @method Genre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenreRepository extends ServiceEntityRepository implements GenreRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Genre::class);
    }

    /**
     * @return Genre[]
     */
    public function getAll(): array
    {
        return $this->findAll();
    }

    public function getByName(string $genre): ?Genre
    {
        return $this->findOneBy(['name' => $genre]);
    }

    public function get(int $id): ?Genre
    {
        return $this->find($id);
    }
}
