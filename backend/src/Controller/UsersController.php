<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

final class UsersController extends AbstractController
{
    #[Route('/api/users', methods:['GET'])]
    public function index(UsersRepository $repo, SerializerInterface $serializer): JsonResponse
    {
        $all = $repo->findAll();

        $json = $serializer->serialize($all, 'json');

        return JsonResponse::fromJsonString($json);
    }

    #[Route('/api/user', methods:['POST'])]
    public function store(Request $resquest, EntityManagerInterface $manager) : JsonResponse
    {
        $user = new Users();
        $user->setName($resquest->request->get('name'));
        $user->setAge($resquest->request->get('age'));

        $manager->persist($user);
        
        $manager->flush();

        return $this->json([
            'message' => 'Usuário Cadastrado com Sucesso!'
        ]);



    }
}
