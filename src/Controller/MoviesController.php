<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MoviesController extends AbstractController
{
    private $movieRepository;
    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    #[Route('/movies', name: 'movies')]
    public function index(): Response
    {
        // findall() - SELECT * FROM movies;
        // find() -> SELECT * FROM movies WHERE id = 11;
        //findBy() - SELECT * FROM movies ORDER BY id DESC;
        //findOneBy() - SELECT * FROM movies WHERE id = 11 AND title = 'The Dark Knight' ORDERE BY id DESC;
        //count() - SELECT COUNT() FROM movies WHERE id = 11;
        
        return $this->render('movies/index.html.twig', [
            'movies' => $this->movieRepository->findAll()

        ]);
    }
}
