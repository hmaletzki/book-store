<?php

namespace App\Repository;

use App\Entity\Book;
use App\Repository\Interfaces\BookRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository implements BookRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function getAll(): array
    {
        return $this->findAll();
    }

    public function getByName(string $book): ?Book
    {
        return $this->findOneBy(['slug' => $book]);
    }

    public function get(int $id): ?Book
    {
        return $this->find($id);
    }
}
