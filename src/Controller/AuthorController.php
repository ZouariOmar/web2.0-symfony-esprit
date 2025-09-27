<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route("/show/{name}_{prename}", name: 'showAuthor')]
    public function showAuthor(string $name, string $prename): Response
    {
        return $this->render("author/show.html.twig", ['name' => $name, 'prename' => $prename]);
    }
}
