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
        if (!empty($request->getContent())){
            try {
                $payload = json_decode($request->getContent());
                $mangaId = $payload->mangaId;
                dump($mangaId);
                if ($mangasRepository->findOneBy(['id' => $mangaId]) == null) {
                    // todo ajouter le comportement si manga non existant
                } else {
                    $manga = $mangasRepository->findOneBy(['id' => $mangaId]);
                    $user = $this->getUser();
                    $user->addMangasReading($manga);
                    $entityManager->persist($user);
                    $entityManager->flush();
                }
            } catch (\Exception $e) {
                // todo ajouter le comportement si erreur
            }
        }
        return $this->render('add_reading/index.html.twig', [
            'controller_name' => 'AddReadingController',
        ]);
    }
}
