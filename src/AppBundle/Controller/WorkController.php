<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Author;
use AppBundle\Entity\Genre;
use AppBundle\Entity\Work;
use AppBundle\Form\WorkType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter;

/**
 * @Route("/work")
 */
class WorkController extends Controller
{
    /**
     * @Route("/all", name="show_work_all")
     * @return Response
     */
    public function showAllWorksAction()
    {
        $works = $this->getDoctrine()->getRepository(Work::class)->findAll();
        return $this->render("work/all.html.twig", ["works" => $works]);
    }

    /**
     * @Route("/create", name="create_work")
     * @param Request $request
     * @return Response
     */
    public function createWorkAction(Request $request)
    {
        $work = new Work();

        $form = $this->createForm(WorkType::class, $work);
        $form->handleRequest($request);

        if ($form->isSubmitted())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($work);
            $em->flush();

            return $this->redirectToRoute("show_work_all");
        }

        return $this->render("work/create.html.twig", ["form" => $form->createView()]);
    }
}
