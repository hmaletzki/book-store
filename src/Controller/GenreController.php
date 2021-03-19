<?php

namespace App\Controller;

use App\Service\GenreProviderServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{
    private GenreProviderServiceInterface $genreProvider;

    /**
     * GenreController constructor.
     * @param GenreProviderServiceInterface $genreProvider
     */
    public function __construct(GenreProviderServiceInterface $genreProvider)
    {
        $this->genreProvider = $genreProvider;
    }


    /**
     * @Route("/genre/{name}", name="genre")
     */
    public function index(string $name): Response
    {
        $genre = $this->genreProvider->getGenreByName($name);

        return $this->render('genre/index.html.twig', [
            'genre' => $genre,
        ]);
    }
}
