<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LibraryController extends AbstractController
{
    #[Route('/library', name: 'app_library')]
    public function index(): Response
    {

        /** @var User $user */
        $user = $this->getUser();

        $mangasReading = $user->getMangasReading()->getValues();

        dd($user, $mangasReading);

        return $this->render('library/index.html.twig', [
            'controller_name' => 'LibraryController',
        ]);
    }
}
