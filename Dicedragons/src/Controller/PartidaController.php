<?php

namespace App\Controller;

use App\Entity\Partida;
use App\Entity\Personaje;
use App\Form\PartidaType;
use App\Repository\PartidaRepository;
use App\Repository\PersonajeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/partida')]
class PartidaController extends AbstractController
{
    #[Route('/', name: 'partida_index', methods: ['GET'])]
    public function index(PartidaRepository $partidaRepository, PersonajeRepository $personajeRepository): Response
    {   $p = $personajeRepository->findAll();
        return $this->render('partida/index.html.twig', [
            'partidas' => $partidaRepository->findAll(),
            'pe' => $p
        ]);
    }

    #[Route('/new', name: 'partida_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $partida = new Partida();
        $form = $this->createForm(PartidaType::class, $partida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($partida);
            $entityManager->flush();

            return $this->redirectToRoute('partida_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partida/new.html.twig', [
            'partida' => $partida,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'partida_show', methods: ['GET'])]
    public function show(Partida $partida): Response
    {
        return $this->render('partida/show.html.twig', [
            'partida' => $partida,
        ]);
    }

    #[Route('/{id}/edit', name: 'partida_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Partida $partida): Response
    {
        $form = $this->createForm(PartidaType::class, $partida);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('partida_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('partida/edit.html.twig', [
            'partida' => $partida,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'partida_delete', methods: ['POST'])]
    public function delete(Request $request, Partida $partida): Response
    {
        if ($this->isCsrfTokenValid('delete'.$partida->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($partida);
            $entityManager->flush();
        }

        return $this->redirectToRoute('partida_index', [], Response::HTTP_SEE_OTHER);
    }
}
