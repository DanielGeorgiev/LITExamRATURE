<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Genre;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/genre")
 */
class GenreController extends Controller
{
    /**
     * @Route("/all", name="show_genre_all")
     * @return Response
     */
    public function showAllGenresActions()
    {
        $genres = $this->getDoctrine()->getRepository(Genre::class)->findAll();
        return $this->render("genre/all.html.twig", ["genres" => $genres]);
    }
}
