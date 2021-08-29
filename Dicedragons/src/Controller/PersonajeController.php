<?php

namespace App\Controller;

use App\Entity\Personaje;
use App\Entity\Razas;
use App\Form\PersonajeType;
use App\Repository\ClasesRepository;
use App\Repository\PersonajeRepository;
use App\Repository\RazasRepository;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personaje')]
class PersonajeController extends AbstractController
{
    #[Route('/', name: 'personaje_index', methods: ['GET'])]
    public function index(PersonajeRepository $personajeRepository): Response
    {
        return $this->render('personaje/index.html.twig', [
            'personajes' => $personajeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'personaje_new', methods: ['GET', 'POST'])]
    public function new(ClasesRepository $clasesRepository
    , RazasRepository $razasRepository): Response {

        $raza = $razasRepository->findAll();
        $clase = $clasesRepository->findAll();
       // $_COOKIE["."];
       /* $personaje = new Personaje();
        $form = $this->createForm(PersonajeType::class, $personaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($personaje);
            $entityManager->flush();

            return $this->redirectToRoute('personaje_index', [], Response::HTTP_SEE_OTHER);
        }*/

        return $this->renderForm('personaje/new.html.twig', [
            'razas' => $raza,
            'clases' => $clase,
        ]);
    }
    #[Route('/anadir', name: 'personaje_anadir')]
    public function anadir(Request $request, Personaje $personaje, UsuarioRepository $usuarioRepository, 
    ClasesRepository $clasesRepository, RazasRepository $razasRepository, EntityManager $em): Response
    {
        $nombre= $request->request->get('name');
        $alienacion= $request->request->get('alin');
        $trasfondo= $request->request->get('tras');
        $clase []= $request->request->get('clase[]');
        $raza = $request->request->get('raza');
        $user = $usuarioRepository->findBy($_COOKIE["email"]);

        $class = $clasesRepository->findBy($clase);
        $race = $razasRepository->findOneBy($raza);


        $personaje = new Personaje();
        $personaje->setNombre($nombre);
        $personaje->setAlienacion($alienacion);
        $personaje->setTrasfondo($trasfondo);
        for ($i=0; $i < count($clase); $i++) { 
            $personaje->addClase($class[$i]);
        }
       
        $personaje->setRaza($race[0]);
        $personaje->setUsuario($user[0]->getNombre());

        $em->persist($personaje);
        $em->flush();

        return $this->renderForm('personaje/index.html.twig', [
          
        ]);

    }

    #[Route('/{id}', name: 'personaje_show', methods: ['GET'])]
    public function show(Personaje $personaje): Response
    {
        return $this->render('personaje/show.html.twig', [
            'personaje' => $personaje,
        ]);
    }

    #[Route('/{id}/edit', name: 'personaje_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Personaje $personaje): Response
    {
        $form = $this->createForm(PersonajeType::class, $personaje);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('personaje_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personaje/edit.html.twig', [
            'personaje' => $personaje,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'personaje_delete', methods: ['POST'])]
    public function delete(Request $request, Personaje $personaje): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personaje->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($personaje);
            $entityManager->flush();
        }

        return $this->redirectToRoute('personaje_index', [], Response::HTTP_SEE_OTHER);
    }
}
