<?php

/**
 * `Author` controller
 *
 * PHP version 8.4.13
 *
 * @changed    10/18/2025
 * @category   Category
 * @package    web2.0-symfony-esprit
 * @subpackage Controller
 * @author     @ZouariOmar <zouariomar20@gmail.com>
 * @license    GPL3.0 License
 * @link       http://127.0.0.1:8000/author
 */

namespace App\Controller;

use App\Entity\Author;
use App\Form\AuthorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ORM\EntityManagerInterface;

/**
 * AuthorController class --> AbstractController
 *
 * <p>
 * [ROUTES]
 * .
 * └── /author
 *    ├── /show/{name}_{prename}
 *    ├── /show/all
 *    ├── /new
 *    ├── /delete/{id}
 *    └── /edit/{id}
 * </p>
 */
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

    #[Route("author/show/all", name: 'app_author_show_all')]
    public function showAllAuthors(EntityManagerInterface $entityManager): Response
    {
        return $this->render("author/showAll.html.twig", [
          'authors' => $entityManager->getRepository(Author::class)->findAll()
        ]);
    }

    #[Route('author/new', name: 'app_author_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $author = $form->getData();
            $em->persist($author);
            $em->flush();
            return $this->redirectToRoute('app_show_authors');
        }
        return $this->render("author/new.html.twig", ['form' => $form->createView()]);
    }

    #[Route('author/delete/{id}', 'app_author_delete')]
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        $er = $em->getRepository(Author::class);
        $entity = $er->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id ' . $id);
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirectToRoute("app_show_authors");
    }

    #[Route('author/edit/{id}', name: 'app_author_edit')]
    public function edit(Request $request, EntityManagerInterface $em, Author $id): Response
    {
        $er = $em->getRepository(Author::class);
        $entity = $er->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id ' . $id);
        }

        $form = $this->createForm(AuthorType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();
            $em->persist($entity);
            $em->flush();
            return $this->redirectToRoute('app_show_authors');
        }

        return $this->render("author/edit.html.twig", ['form' => $form->createView()]);
    }
}
