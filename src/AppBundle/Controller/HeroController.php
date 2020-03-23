<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Hero;
use AppBundle\Form\HeroType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/character")
 */
class HeroController extends Controller
{
    /**
     * @Route("/all", name="show_character_all")
     * @return Response
     */
    public function showAllCharactersAction()
    {
        $characters = $this->getDoctrine()->getRepository(Hero::class)->findAll();
        return $this->render('character/all.html.twig', ["characters" => $characters]);
    }

    /**
     * @Route("/create", name="create_character")
     * @param Request $request
     * @return Response
     */
    public function createCharacterAction(Request $request)
    {
        $hero = new Hero();

        $form = $this->createForm(HeroType::class, $hero);
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hero);
            $em->flush();

            return $this->redirectToRoute("show_character_all");
        }

        return $this->render('character/create.html.twig', ['form' => $form->createView()]);
    }
}
