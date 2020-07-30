<?php

namespace App\Controller;

use App\Entity\ResService;
use App\Form\ResServiceType;
use App\Repository\ResServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/service")
 */
class ResServiceController extends AbstractController
{
    /**
     * @Route("/", name="res_service_index", methods={"GET"})
     */
    public function index(ResServiceRepository $resServiceRepository): Response
    {
        return $this->render('res_service/index.html.twig', [
            'res_services' => $resServiceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="res_service_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $resService = new ResService();
        $form = $this->createForm(ResServiceType::class, $resService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($resService);
            $entityManager->flush();

            return $this->redirectToRoute('res_service_index');
        }

        return $this->render('res_service/new.html.twig', [
            'res_service' => $resService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="res_service_show", methods={"GET"})
     */
    public function show(ResService $resService): Response
    {
        return $this->render('res_service/show.html.twig', [
            'res_service' => $resService,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="res_service_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ResService $resService): Response
    {
        $form = $this->createForm(ResServiceType::class, $resService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('res_service_index');
        }

        return $this->render('res_service/edit.html.twig', [
            'res_service' => $resService,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}/delete", name="res_service_delete")
     */
    public function delete(Request $request, ResService $resService): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($resService);
        $entityManager->flush();

        return $this->redirectToRoute('res_service_index');
    }
}
