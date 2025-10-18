<?php

/**
 * `Book` controller
 *
 * PHP version 8.4.13
 *
 * @changed    10/18/2025
 * @category   controller
 * @package    web2.0-symfony-esprit
 * @subpackage Controller
 * @author     @ZouariOmar <zouariomar20@gmail.com>
 * @license    GPL3.0 License
 * @link       http://127.0.0.1:8000/book
 */

namespace App\Controller;

use App\Entity\Book;
use App\Form\BookType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * BookController class --> AbstractController
 *
 * <p>
 * [ROUTES]
 * .
 * └── /book
 *    ├── /show/all
 *    ├── /new
 *    ├── /delete/{id}
 *    └── /edit/{id}
 * </p>
 */
final class BookController extends AbstractController
{
    #[Route('/book', name: 'app_book')]
    public function index(): Response
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    #[Route("book/show", name: 'app_book_show')]
    public function showAllBooks(EntityManagerInterface $emi): Response
    {
        return $this->render("book/show.html.twig", [
          'books' => $emi->getRepository(Book::class)->findAll()
        ]);
    }

    #[Route('book/new', name: 'app_book_new')]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $book = $form->getData();
            $em->persist($book);
            $em->flush();
            return $this->redirectToRoute('app_book_show');
        }
        return $this->render("book/new.html.twig", ['form' => $form->createView()]);
    }

    #[Route('book/delete/{id}', 'app_book_delete')]
    public function delete(EntityManagerInterface $em, int $id): Response
    {
        $er = $em->getRepository(Book::class);
        $entity = $er->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id ' . $id);
        }
        $em->remove($entity);
        $em->flush();
        return $this->redirectToRoute("app_book_show");
    }

    #[Route('book/edit/{id}', name: 'app_book_edit')]
    public function edit(Request $request, EntityManagerInterface $em, Book $id): Response
    {
        $er = $em->getRepository(Book::class);
        $entity = $er->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('No entity found for id ' . $id);
        }

        $form = $this->createForm(BookType::class, $entity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entity = $form->getData();
            $em->persist($entity);
            $em->flush();
            return $this->redirectToRoute('app_book_show');
        }

        return $this->render("book/edit.html.twig", ['form' => $form->createView()]);
    }
}
