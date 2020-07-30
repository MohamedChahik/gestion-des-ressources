<?php

namespace App\Controller;

use App\Entity\ResIntervention;
use App\Form\ResInterventionType;
use App\Repository\ResInterventionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/intervention")
 */
class ResInterventionController extends AbstractController
{
    /**
     * @Route("/", name="res_intervention_index", methods={"GET"})
     */
    public function index(ResInterventionRepository $resInterventionRepository): Response
    {
        return $this->render('res_intervention/index.html.twig', ['res_interventions' => $resInterventionRepository->findAll(),]);
    }

    /**
     * @Route("/new", name="res_intervention_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resIntervention = new ResIntervention();
        $form = $this->createForm(ResInterventionType::class, $resIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resIntervention);
            $entityManager->flush();

            return $this->redirectToRoute('res_intervention_index');
        }

        return $this->render('res_intervention/new.html.twig', ['res_intervention' => $resIntervention, 'form' => $form->createView(),]);
    }

    /**
     * @Route("/{id}", name="res_intervention_show", methods={"GET"})
     */
    public function show(ResIntervention $resIntervention): Response
    {
        return $this->render('res_intervention/show.html.twig', ['res_intervention' => $resIntervention,]);
    }

    /**
     * @Route("/{id}/edit", name="res_intervention_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResIntervention $resIntervention): Response
    {
        $form = $this->createForm(ResInterventionType::class, $resIntervention);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_intervention_index');
        }

        return $this->render('res_intervention/edit.html.twig', ['res_intervention' => $resIntervention, 'form' => $form->createView(),]);
    }

    /**
     * @Route("/{id}/delete", name="res_intervention_delete")
     */
    public function delete(Request $request, ResIntervention $resIntervention): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($resIntervention);
        $entityManager->flush();

        return $this->redirectToRoute('res_intervention_index');
    }
}
