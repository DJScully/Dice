<?php

namespace App\Controller;

use App\Entity\Personaje;
use App\Form\PersonajeType;
use App\Repository\ClasesRepository;
use App\Repository\PersonajeRepository;
use App\Repository\RazasRepository;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/personaje')]
class PersonajeController extends AbstractController
{
    #[Route('/', name: 'personaje_index', methods: ['GET'])]
    public function index(UsuarioRepository $usuarioRepository, PersonajeRepository $personajeRepository): Response
    { 
        $user = $usuarioRepository->find($this->getUser());
        //dump($user->getPersonajes());
        $per = $personajeRepository->findAll();
        $personas = $user->getPersonajes();
        $a [] = null;
        $p = null;
        for ($i=0; $i < count($personas) ; $i++) { 
            //echo $personas[$i];
            $p = $personajeRepository->find($personas[$i]);
            echo $p;
            array_push($a, $p->getId());
          
        }  $id = ($p->getId());
            echo $id;
        $a = $personajeRepository->findBy($a);
       // dump($user);
//dump($per);
        //$per = $personajeRepository->findBy($user);
        return $this->render('personaje/index.html.twig', [
            'personajes' =>$a
        ]);
    }

    #[Route('/new', name: 'personaje_new')]
    public function new(ClasesRepository $clasesRepository
    , RazasRepository $razasRepository): Response {

        $raza = $razasRepository->findAll();
        $clase = $clasesRepository->findAll();
        return $this->renderForm('personaje/new.html.twig', [
            'razas' => $raza,
            'clases' => $clase,
        ]);
    }
    #[Route('/anadir', name: 'personaje_anadir', methods: ['GET', 'POST'])]
    public function anadir(Request $request, 
    ClasesRepository $clasesRepository, RazasRepository $razasRepository, EntityManagerInterface $em): Response
    {
        $nombre= $request->request->get('name');
        $alienacion= $request->request->get('alin');
        $trasfondo= $request->request->get('tras');

        $clases= $request->request->get('clase');
        dump($clases);
        $raza = $request->request->get('raza');
        $user = $this->getUser();

       
        $race = $razasRepository->findOneBy( ['Nombre' => $raza] );
        dump($race);

        $personaje = new Personaje();
        $personaje->setNombre($nombre);
        $personaje->setAlienacion($alienacion);
        $personaje->setTrasfondo($trasfondo);

        foreach($clases as $nombreClase){
            $class = $clasesRepository->findOneBy( ['Nombre' => $nombreClase] );
            $personaje->addClase($class);
        }
       
        $personaje->setRaza($race);
        $personaje->setUsuario($user);

        $em->persist($personaje);
        $em->flush();

        return $this->redirectToRoute('personaje_index');

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
