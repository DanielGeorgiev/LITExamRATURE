<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Form\AuthorType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/author")
 */
class AuthorController extends Controller
{
    /**
     * @Route("/all", name="show_author_all")
     */
    public function showAuthorsAction()
    {
        $repo = $this->getDoctrine()->getRepository(Author::class);
        $authors = $repo->findAll();
        return $this->render('author/all.html.twig', ["authors" => $authors]);
    }

    /**
     * @Route("/view/{id}", name="show_author_id")
     * @param int $id
     * @return Response
     */
    public function showAuthorByIdAction($id)
    {
        $author = $this->getDoctrine()
            ->getRepository(Author::class)
            ->find($id);

        return $this->render('author/id.html.twig', ["author" => $author]);
    }

    /**
     * @Route("/create", name="create_author")
     * @param Request $request
     * @return Response
     */
    public function createAuthorAction(Request $request)
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($author);
            $em->flush();

            return  $this->redirectToRoute('show_author_all');
        }

        return $this->render('author/create.html.twig', ['form' => $form]);
    }

}
