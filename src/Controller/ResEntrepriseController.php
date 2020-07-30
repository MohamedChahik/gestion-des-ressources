<?php

namespace App\Controller;

use App\Entity\ResEntreprise;
use App\Form\ResEntrepriseType;
use App\Repository\ResEntrepriseRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/entreprise")
 */
class ResEntrepriseController extends AbstractController
{
    /**
     * @Route("/", name="res_entreprise_index", methods={"GET"})
     */
    public function index(ResEntrepriseRepository $resEntrepriseRepository): Response
    {
        return $this->render('res_entreprise/index.html.twig', [
            'res_entreprises' => $resEntrepriseRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="res_entreprise_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resEntreprise = new ResEntreprise();
        $form = $this->createForm(ResEntrepriseType::class, $resEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resEntreprise);
            $entityManager->flush();

            return $this->redirectToRoute('res_entreprise_index');
        }

        return $this->render('res_entreprise/new.html.twig', [
            'res_entreprise' => $resEntreprise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="res_entreprise_show", methods={"GET"})
     */
    public function show(ResEntreprise $resEntreprise): Response
    {
        return $this->render('res_entreprise/show.html.twig', [
            'res_entreprise' => $resEntreprise,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="res_entreprise_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResEntreprise $resEntreprise): Response
    {
        $form = $this->createForm(ResEntrepriseType::class, $resEntreprise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_entreprise_index');
        }

        return $this->render('res_entreprise/edit.html.twig', [
            'res_entreprise' => $resEntreprise,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="res_entreprise_delete")
     */
    public function delete(Request $request, ResEntreprise $resEntreprise): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($resEntreprise);
        $entityManager->flush();

        return $this->redirectToRoute('res_entreprise_index');
    }
}
