<?php

namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\UsuarioRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Config\SecurityConfig;

#[Route('/usuario')] 
class UsuarioController extends AbstractController
{
    #[Route('/', name: 'usuario')]
    public function index(UsuarioRepository $usuarioRepository): Response
    {

        $fondo = $usuarioRepository->findAll();


        return $this->render('usuario/index.html.twig', [
            'fondos' => $fondo
        ]);
    }
    #[Route('/new', name: 'usuario-new')]
    public function new(): Response{

       return $this->render('usuario/new.html.twig');
    }

    #[Route('/insert', name: 'usuario-insert')]
    public function insert(Request $request, EntityManagerInterface $em): Response{
        $nombre= $request->request->get('name');
        $email= $request->request->get('email');
        $password= $request->request->get('password');
        $rol []= $request->request->get('rol');


        $usuario = new Usuario();

        $security = password_hash($password,PASSWORD_DEFAULT);

        $usuario->setNombre($nombre);
        $usuario->setEmail($email);
        $usuario->setPassword($security);
        $usuario->setRoles($rol);

        $em->persist($usuario);
        $em->flush();

       return $this->render('usuario/index.html.twig', [
            'controller_name' => 'UsuarioController',
        ]);
    }
}
