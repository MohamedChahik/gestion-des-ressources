<?php

namespace App\Controller;

use App\Entity\ResDemande;
use App\Form\ResDemandeType;
use App\Repository\ResDemandeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/demande")
 */
class ResDemandeController extends AbstractController
{
    /**
     * @Route("/", name="res_demande_index", methods={"GET"})
     */
    public function index(ResDemandeRepository $resDemandeRepository): Response
    {
        return $this->render('res_demande/index.html.twig', [
            'res_demandes' => $resDemandeRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="res_demande_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resDemande = new ResDemande();
        $form = $this->createForm(ResDemandeType::class, $resDemande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resDemande);
            $entityManager->flush();

            return $this->redirectToRoute('res_demande_index');
        }

        return $this->render('res_demande/new.html.twig', [
            'res_demande' => $resDemande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="res_demande_show", methods={"GET"})
     */
    public function show(ResDemande $resDemande): Response
    {
        return $this->render('res_demande/show.html.twig', [
            'res_demande' => $resDemande,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="res_demande_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResDemande $resDemande): Response
    {
        $form = $this->createForm(ResDemandeType::class, $resDemande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_demande_index');
        }

        return $this->render('res_demande/edit.html.twig', [
            'res_demande' => $resDemande,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="res_demande_delete", methods={"DELETE"})
     */
    public function delete(Request $request, ResDemande $resDemande): Response
    {
        if ($this->isCsrfTokenValid('delete'.$resDemande->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($resDemande);
            $entityManager->flush();
        }

        return $this->redirectToRoute('res_demande_index');
    }
}
