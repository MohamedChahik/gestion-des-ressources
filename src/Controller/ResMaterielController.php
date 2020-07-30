<?php

namespace App\Controller;

use App\Entity\ResMateriel;
use App\Form\ResMaterielType;
use App\Repository\ResMaterielRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/materiel")
 */
class ResMaterielController extends AbstractController
{
    /**
     * @Route("/", name="res_materiel_index", methods={"GET"})
     */
    public function index(ResMaterielRepository $resMaterielRepository): Response
    {
        return $this->render('res_materiel/index.html.twig', [
            'res_materiels' => $resMaterielRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="res_materiel_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resMateriel = new ResMateriel();
        $form = $this->createForm(ResMaterielType::class, $resMateriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resMateriel);
            $entityManager->flush();

            return $this->redirectToRoute('res_materiel_index');
        }

        return $this->render('res_materiel/new.html.twig', [
            'res_materiel' => $resMateriel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="res_materiel_show", methods={"GET"})
     */
    public function show(ResMateriel $resMateriel): Response
    {
        return $this->render('res_materiel/show.html.twig', [
            'res_materiel' => $resMateriel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="res_materiel_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResMateriel $resMateriel): Response
    {
        $form = $this->createForm(ResMaterielType::class, $resMateriel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_materiel_index');
        }

        return $this->render('res_materiel/edit.html.twig', [
            'res_materiel' => $resMateriel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="res_materiel_delete")
     */
    public function delete(Request $request, ResMateriel $resMateriel): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($resMateriel);
        $entityManager->flush();

        return $this->redirectToRoute('res_materiel_index');
    }
}
