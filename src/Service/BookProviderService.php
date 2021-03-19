<?php


namespace App\Service;


use App\Entity\Book;
use App\Repository\Interfaces\BookRepositoryInterface;
use Doctrine\Common\Collections\ArrayCollection;

class BookProviderService implements BookProviderServiceInterface
{
    private BookRepositoryInterface $bookRepository;

    /**
     * BookProviderService constructor.
     * @param BookRepositoryInterface $bookRepository
     */
    public function __construct(BookRepositoryInterface $bookRepository)
    {
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return Book[]
     */
    public function getBooks(): array
    {
        return $this->bookRepository->getAll();
    }

    public function getBook(int $id): Book
    {
        return $this->bookRepository->get($id);
    }

    public function getBookByName(string $name): Book
    {
        return $this->bookRepository->getByName($name);
    }
}
