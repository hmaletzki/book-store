<?php

namespace App\Controller;

use App\Service\BookProviderServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    private BookProviderServiceInterface $bookProvider;

    /**
     * BookController constructor.
     * @param BookProviderServiceInterface $bookProvider
     */
    public function __construct(BookProviderServiceInterface $bookProvider)
    {
        $this->bookProvider = $bookProvider;
    }

    /**
     * @Route("/book/{name}", name="book")
     */
    public function index(string $name): Response
    {
        $book = $this->bookProvider->getBookByName($name);

        return $this->render('book/detail.html.twig', [
            'book' => $book,
        ]);
    }
}
