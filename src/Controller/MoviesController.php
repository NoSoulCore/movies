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
    private $em; //entity manager
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    #[Route('/movies', name: 'movies')]
    public function index(EntityManagerInterface $em): Response
    {
        // findall() - SELECT * FROM movies;
        // find() -> SELECT * FROM movies WHERE id = 11;
        //findBy() - SELECT * FROM movies ORDER BY id DESC;
        //findOneBy() - SELECT * FROM movies WHERE id = 11 AND title = 'The Dark Knight' ORDERE BY id DESC;
        //count() - SELECT COUNT() FROM movies WHERE id = 11;

        return $this->render('index.html.twig');
    }
}
