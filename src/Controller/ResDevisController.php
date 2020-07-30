<?php

namespace App\Controller;

use App\Entity\ResDevis;
use App\Form\ResDevisType;
use App\Repository\ResDevisRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/devis")
 */
class ResDevisController extends AbstractController
{
    /**
     * @Route("/", name="res_devis_index", methods={"GET"})
     */
    public function index(ResDevisRepository $resDevisRepository): Response
    {
        return $this->render('res_devis/index.html.twig', ['res_devis' => $resDevisRepository->findAll(),]);
    }

    /**
     * @Route("/new", name="res_devis_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resDevi = new ResDevis();
        $form = $this->createForm(ResDevisType::class, $resDevi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resDevi);
            $entityManager->flush();

            return $this->redirectToRoute('res_devis_index');
        }

        return $this->render('res_devis/new.html.twig', ['res_devi' => $resDevi, 'form' => $form->createView(),]);
    }

    /**
     * @Route("/{id}", name="res_devis_show", methods={"GET"})
     */
    public function show(ResDevis $resDevi): Response
    {
        return $this->render('res_devis/show.html.twig', ['res_devi' => $resDevi,]);
    }

    /**
     * @Route("/{id}/detail/materiel", name="res_devis_detail", methods={"GET"})
     */
    public function showMateriel(ResDevis $resDevi): Response
    {
        $materiels = $resDevi->getMateriel();
        return $this->render('res_devis/materiel.html.twig', ['materiels' => $materiels,]);
    }

    /**
     * @Route("/{id}/detail/service", name="res_devis_detail_service", methods={"GET"})
     */
    public function showService(ResDevis $resDevi): Response
    {
        $services = $resDevi->getService();
        return $this->render('res_devis/service.html.twig', ['services' => $services,]);
    }
    /**
     * @Route("/{id}/edit", name="res_devis_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResDevis $resDevi): Response
    {
        $form = $this->createForm(ResDevisType::class, $resDevi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_devis_index');
        }

        return $this->render('res_devis/edit.html.twig', ['res_devi' => $resDevi, 'form' => $form->createView(),]);
    }

    /**
     * @Route("/{id}/delete", name="res_devis_delete")
     */
    public function delete(Request $request, ResDevis $resDevi): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($resDevi);
        $entityManager->flush();

        return $this->redirectToRoute('res_devis_index');
    }
}
