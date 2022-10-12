<?php

namespace App\Controller;


use App\Entity\Mangas;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;
    private $userRepository;
    private $mangaRepository;


    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->userRepository = $this->entityManager->getRepository(User::class);
        $this->mangaRepository = $this->entityManager->getRepository(Mangas::class);


    }
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        $mangas = $this->mangaRepository->GetTop10();

        dd($mangas);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }
}
