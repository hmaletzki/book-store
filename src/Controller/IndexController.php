<?php

namespace App\Controller;

use App\Service\BookProviderServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    private $bookProviderService;

    /**
     * IndexController constructor.
     * @param $bookProviderService
     */
    public function __construct(BookProviderServiceInterface $bookProviderService)
    {
        $this->bookProviderService = $bookProviderService;
    }


    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('index.html.twig', [
            'books' => $this->bookProviderService->getBooks(),
        ]);
    }
}
