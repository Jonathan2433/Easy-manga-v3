<?php

namespace App\Controller;


use App\Repository\MangasRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddReadingController extends AbstractController
{
    #[Route('/add', name: 'app_add_reading')]
    public function index(Request $request, MangasRepository $mangasRepository, EntityManagerInterface $entityManager): Response
    {


        $payload = json_decode($request->getContent());
//        dump($payload);
        $mangaId = $payload->mangaId;
        $manga = $mangasRepository->findOneBy(['id' => $mangaId]);
        $user = $this->getUser();
        $user->addMangasReading($manga);
        $entityManager->persist($user);
        $entityManager->flush();



        return $this->render('add_reading/index.html.twig', [
            'controller_name' => 'AddReadingController',
        ]);
    }
}