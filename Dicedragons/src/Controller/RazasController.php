<?php

namespace App\Controller;

use App\Entity\Razas;
use App\Form\RazasType;
use App\Repository\RazasRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/razas')]
class RazasController extends AbstractController
{
    #[Route('/', name: 'razas_index', methods: ['GET'])]
    public function index(RazasRepository $razasRepository): Response
    {
        return $this->render('razas/index.html.twig', [
            'razas' => $razasRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'razas_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $raza = new Razas();
        $form = $this->createForm(RazasType::class, $raza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($raza);
            $entityManager->flush();

            return $this->redirectToRoute('razas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('razas/new.html.twig', [
            'raza' => $raza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'razas_show', methods: ['GET'])]
    public function show(Razas $raza): Response
    {
        return $this->render('razas/show.html.twig', [
            'raza' => $raza,
        ]);
    }

    #[Route('/{id}/edit', name: 'razas_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Razas $raza): Response
    {
        $form = $this->createForm(RazasType::class, $raza);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('razas_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('razas/edit.html.twig', [
            'raza' => $raza,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'razas_delete', methods: ['POST'])]
    public function delete(Request $request, Razas $raza): Response
    {
        if ($this->isCsrfTokenValid('delete'.$raza->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($raza);
            $entityManager->flush();
        }

        return $this->redirectToRoute('razas_index', [], Response::HTTP_SEE_OTHER);
    }
}
