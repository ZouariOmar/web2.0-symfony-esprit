<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

final class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    #[Route("author/show/{name}_{prename}", name: 'app_show_author')]
    public function showAuthor(string $name, string $prename): Response
    {
        return $this->render("author/show.html.twig", ['name' => $name, 'prename' => $prename]);
    }

    #[Route("author/show/all", name: 'app_show_authors')]
    public function showAllAuthors(EntityManagerInterface $entityManager): Response
    {
        return $this->render("author/showAll.html.twig", [
          'authors' => $entityManager->getRepository(Author::class)->findAll()
        ]);
    }

    #[Route('author/new', name: 'app_author_new')]
    public function new(): Response
    {
        return $this->render("author/new.html.twig");
    }
}
