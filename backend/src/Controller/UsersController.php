<?php

namespace App\Controller;

use App\Entity\Users;
use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

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
    public function store(Request $request, HttpClientInterface $client) : JsonResponse
    {
        $user = new Users();
        $user->setName($request->request->get('name'));
        $user->setAge($request->request->get('age'));

        $idObject = $request->request->get('idObject');
        
        $fileUploded = $request->files->get('file');

        $fileName = 'file.'.$fileUploded->guessExtension();
                
        $fileUploded->move('./', $fileName);

        $response = $client->request('POST', 'http://container-test-archive/code/uploadFile.php', [
            'body' => ['checklist' => fopen($fileName, 'r'), 'idObject' => $idObject]
        ]);

        $idFile = $response->getContent();
                        
        /*
        $manager->persist($user);
        
        $manager->flush();
        $response->getContent()
*/
        

    }
}
