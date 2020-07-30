<?php

namespace App\Controller;

use App\Entity\ResTechnicien;
use App\Form\ResTechnicienType;
use App\Repository\ResTechnicienRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/technicien")
 */
class ResTechnicienController extends AbstractController
{
    /**
     * @Route("/", name="res_technicien_index", methods={"GET"})
     */
    public function index(ResTechnicienRepository $resTechnicienRepository): Response
    {
        return $this->render('res_technicien/index.html.twig', ['res_techniciens' => $resTechnicienRepository->findAll(),]);
    }

    /**
     * @Route("/new", name="res_technicien_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resTechnicien = new ResTechnicien();
        $form = $this->createForm(ResTechnicienType::class, $resTechnicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resTechnicien);
            $entityManager->flush();

            return $this->redirectToRoute('res_technicien_index');
        }

        return $this->render('res_technicien/new.html.twig', ['res_technicien' => $resTechnicien, 'form' => $form->createView(),]);
    }

    /**
     * @Route("/{id}", name="res_technicien_show", methods={"GET"})
     */
    public function show(ResTechnicien $resTechnicien): Response
    {
        return $this->render('res_technicien/show.html.twig', ['res_technicien' => $resTechnicien,]);
    }

    /**
     * @Route("/{id}/edit", name="res_technicien_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResTechnicien $resTechnicien): Response
    {
        $form = $this->createForm(ResTechnicienType::class, $resTechnicien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_technicien_index');
        }

        return $this->render('res_technicien/edit.html.twig', ['res_technicien' => $resTechnicien, 'form' => $form->createView(),]);
    }

    /**
     * @Route("/{id}/delete", name="res_technicien_delete")
     */
    public function delete(Request $request, ResTechnicien $resTechnicien): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($resTechnicien);
        $entityManager->flush();

        return $this->redirectToRoute('res_technicien_index');
    }
}
