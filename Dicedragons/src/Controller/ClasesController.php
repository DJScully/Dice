<?php

namespace App\Controller;

use App\Entity\Clases;
use App\Form\ClasesType;
use App\Repository\ClasesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/clases')]
class ClasesController extends AbstractController
{
    #[Route('/', name: 'clases_index', methods: ['GET'])]
    public function index(ClasesRepository $clasesRepository): Response
    {
        return $this->render('clases/index.html.twig', [
            'clases' => $clasesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'clases_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $clase = new Clases();
        $form = $this->createForm(ClasesType::class, $clase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($clase);
            $entityManager->flush();

            return $this->redirectToRoute('clases_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('clases/new.html.twig', [
            'clase' => $clase,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'clases_show', methods: ['GET'])]
    public function show(Clases $clase): Response
    {
        return $this->render('clases/show.html.twig', [
            'clase' => $clase,
        ]);
    }

    #[Route('/{id}/edit', name: 'clases_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Clases $clase): Response
    {
        $form = $this->createForm(ClasesType::class, $clase);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('clases_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('clases/edit.html.twig', [
            'clase' => $clase,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'clases_delete', methods: ['POST'])]
    public function delete(Request $request, Clases $clase): Response
    {
        if ($this->isCsrfTokenValid('delete'.$clase->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($clase);
            $entityManager->flush();
        }

        return $this->redirectToRoute('clases_index', [], Response::HTTP_SEE_OTHER);
    }
}
