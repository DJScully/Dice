<?php

namespace App\Controller;

use App\Entity\Partida;
use App\Entity\Personaje;
use App\Form\PartidaType;
use Doctrine\ORM\EntityManagerInterface;

use App\Repository\PartidaRepository;
use App\Repository\PersonajeRepository;
use App\Repository\UsuarioRepository;
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

    #[Route('/partidas_propias', name: 'partida_propia', methods: ['GET'])]
    public function propias(UsuarioRepository $usuarioRepository,PartidaRepository $partidaRepository): Response{
        $user = $usuarioRepository->find($this->getUser());
        $partidas = $user->getPartidas(); $array = [];
        for ($i=0; $i < count($partidas) ; $i++) { 
            $array[$i] = $partidas[$i];
        }
        //$p = $personajeRepository->findAll();
        return $this->render('partida/propias.html.twig', [
            'partidas' => $array,
            
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

    #[Route('/{id}/anadir', name: 'partida_anadir', methods: ['GET', 'POST'])]
    public function anadir(UsuarioRepository $usuarioRepository, Partida $partida, PartidaRepository $partidaRepository,$id): Response
    {

        $user = $usuarioRepository->find($this->getUser());

        $party = $partidaRepository->find($id);

        

        dump($party);
        $array = $user->getPersonajes();

        return $this->render('partida/anadir.html.twig', [
            'partidas' => $array, 'partys' => $party,
           
        ]);
    }

    #[Route('/person', name: 'partida_person', methods: ['GET', 'POST'])]
    public function person(Request $request,EntityManagerInterface $em,PersonajeRepository $personajeRepository, 
    UsuarioRepository $usuarioRepository, PartidaRepository $partidaRepository): Response
    {        
        $id = $request->request->get('id');


        $partida = $partidaRepository->find($id);

        $nombre = $request->request->get('personaje');



        $per = $personajeRepository->findOneBy(['Nombre' => $nombre]);
        
        $partida->addPersonaje($per);

        $em->persist($partida);

        $em->flush();


        return $this->renderForm('partida/index.html.twig', [
            'partidas' => $partidaRepository->findAll()
           
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
