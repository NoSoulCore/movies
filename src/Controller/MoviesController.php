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

    #[Route('/movies', methods:['GET'], name: 'movies')]
    public function index(): Response
    {
        $movies = $this->movieRepository->findAll();
        
        return $this->render('movies/index.html.twig', [
            'movies' => $movies
        ]);
    }

    #[Route('/movies/{id}', methods:['GET'],  name: 'show_movie')]
    public function show($id): Response
    {
        $movie = $this->movieRepository->find($id);
        
        return $this->render('movies/show.html.twig', [
            'movie' => $movie
        ]);
    }

    #[Route('/test', methods:['GET'],  name: 'test_page')]
    public function test(): Response
    {
        $av = 10;
        
        return $this->render('test/index.html.twig', [
            'av' => $av
        ]);
    }

    // #[Route('/movies/{id}', methods:['GET'], name: 'movies')]
    // public function index(): Response
    // {
        
    //     return $this->render('movies/index.html.twig', [
    //         'movies' => $this->movieRepository->findAll()
    //     ]);
    // }
}
