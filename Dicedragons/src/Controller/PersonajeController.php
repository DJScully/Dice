<?php

namespace App\Controller;

use App\Entity\Personaje;
use App\Form\PersonajeType;
use App\Repository\ClasesRepository;
use App\Repository\PersonajeRepository;
use App\Repository\RazasRepository;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpParser\Node\Expr\Cast\Array_;
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
       
        $personas = $user->getPersonajes();
       
        $array = [];
        for ($i=0; $i < count($personas) ; $i++) { 
            $array[$i] = $personas[$i];
        }
        return $this->render('personaje/index.html.twig', [
            'personajes' =>$array
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

        $fuerza= $request->request->get('fuerza');
        $destreza= $request->request->get('destreza');
        $constitucion= $request->request->get('constitucion');
        $inteligencia= $request->request->get('inteligencia');
        $sabiduria= $request->request->get('sabiduria');
        $carisma= $request->request->get('carisma');

        $total = $fuerza+$destreza+$constitucion+$inteligencia+$sabiduria+$carisma;
        $var = [];
        $array = [$fuerza,$destreza,$constitucion,$inteligencia,$sabiduria,$carisma];
        if ($total == (48+27)) {
           
            for ($i=0; $i < count($array); $i++) { 

                if ($array[$i] < 28 && $array[$i] > 7) {
                    if($array[$i]>=8 && $array[$i]<10){
                        $var[$i]=-1;
                    } elseif($array[$i]>=10 && $array[$i]<12){
                        $var[$i]=0;
                    } elseif($array[$i]>=12 && $array[$i]<14){
                        $var[$i]=1;
                    } elseif($array[$i]>=14 && $array[$i]<16){
                        $var[$i]=2;
                    } elseif($array[$i]>=16 && $array[$i]<18){
                        $var[$i]=3;
                    }
                } else {
                    return $this->redirectToRoute('personaje_new');
                }

                
            }
        } else {
            return $this->redirectToRoute('personaje_new');
        }


        dump($array);

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
        $personaje->setFuerza($var[0]);
        $personaje->setDestreza($var[1]);
        $personaje->setConstitucion($var[2]);
        $personaje->setInteligencia($var[3]);
        $personaje->setSabiduria($var[4]);
        $personaje->setCarisma($var[5]);


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
