<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hero;
use AppBundle\Entity\Work;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/tests")
 */
class TestController extends Controller
{
    /**
     * @Route("/works", name="test_works")
     * @return Response
     */
    public function worksTestAction()
    {
        $works = $this->getDoctrine()->getRepository(Work::class)->findAll();
        shuffle($works);

        return $this->render('test/works.html.twig', ['works' => $works]);
    }

    /**
     * @Route("/genres", name="test_genres")
     * @return Response
     */
    public function genresTestAction()
    {
        $works = $this->getDoctrine()->getRepository(Work::class)->findAll();
        shuffle($works);

        return $this->render('test/genres.html.twig', ['works' => $works]);
    }

    /**
     * @Route("/characters", name="test_characters")
     * @return Response
     */
    public function charactersTestAction()
    {
        $characters = $this->getDoctrine()->getRepository(Hero::class)->findAll();
        shuffle($characters);

        return $this->render('test/characters.html.twig', ['characters' => $characters]);
    }
}
