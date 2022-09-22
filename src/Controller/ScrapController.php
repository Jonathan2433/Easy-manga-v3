<?php

namespace App\Controller;

use App\Entity\Authors;
use App\Entity\Genders;
use App\Entity\Illustrators;
use App\Entity\Mangas;

use App\Entity\Type;
use App\Repository\AuthorsRepository;
use App\Repository\GendersRepository;
use App\Repository\IllustratorsRepository;
use App\Repository\TypeRepository;
use App\service\CallApiService;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ScrapController extends AbstractController
{
    // integre doctrine sous la variable $entityManager
    private $entityManager;

    private $callApiService;

    private $gendersRepository;

    private $typeRepository;

    private $authorsRepository;

    private $illustratorRepository;

    public function __construct(EntityManagerInterface $entityManager, CallApiService $callApiService, GendersRepository $gendersRepository, TypeRepository $typeRepository, AuthorsRepository $authorsRepository, IllustratorsRepository $illustratorRepository)
    {
        $this->entityManager = $entityManager;
        $this->callApiService = $callApiService;
        $this->gendersRepository = $gendersRepository;
        $this->typeRepository = $typeRepository;
        $this->authorsRepository = $authorsRepository;
        $this->illustratorRepository = $illustratorRepository;

    }

    #[Route('/scrap', name: 'app_scrap')]
    public function index(): Response
    {

        $topMangasData = $this->callApiService->getTopMangas(1);

        $pagination = $topMangasData['pagination'];
        $pages = $pagination['last_visible_page'];


        $page = 1;
        while ($page <= 20) {
            $topMangasData = $this->callApiService->getTopMangas($page);
            $topMangas = $topMangasData['data'];

            foreach ($topMangas as $manga) {
                $newManga = new Mangas();
                $newManga->setIsCategorize(false);


                if (!empty($manga['genres'] && !empty($manga['themes']) )) {


                    $newGenders = new Genders();

                    $newAuthor = new Authors();
                    $newIllustrator = new Illustrators();

                    $createdAt = new DateTimeImmutable();

                    $newManga->setIsCategorize(true);

                    foreach ($manga['genres'] as $genre) {
                        $target = array('Ecchi', 'Harem', 'Hentai', 'Yaoi', 'Yuri');

                        if (count(array_intersect($genre, $target)) > 0) {
                            $newManga->setIsForAdult(true);
                            $newGenders->setIsForAdult(true);
                        } else {
                            $newManga->setIsForAdult(false);
                            $newGenders->setIsForAdult(false);
                        }

                        $genderName = $genre['name'];

                        $arrayCount = $this->gendersRepository->findOneByName($genderName);

                        if ($arrayCount == 0) {

                            $newGenders->setName($genre['name']);
                            $newGenders->setIdApi($genre['mal_id']);


                            $newGenders->setCreatedAt($createdAt);
                            $newGenders->setUpdatedAt($createdAt);

                            $this->entityManager->persist($newGenders);
                            $this->entityManager->flush();
                        }
                    }
                    foreach ($manga['themes'] as $theme) {
                        $themeName = $theme['name'];

                        $arrayCount = $this->typeRepository->findOneByName($themeName);

                        if ($arrayCount == 0) {

                            $newTheme = new Type();

                            $targetTheme = array('Ecchi', 'Harem', 'Hentai', 'Yaoi', 'Yuri');

                            if (count(array_intersect($theme, $targetTheme)) > 0) {
                                $newTheme->setIsForAdult(true);
                            } else {
                                $newTheme->setIsForAdult(false);
                            }

                            $newTheme->setName($theme['name']);
                            $newTheme->setIdApi($theme['mal_id']);



                            $newTheme->setCreatedAt($createdAt);
                            $newTheme->setUpdatedAt($createdAt);

                            $this->entityManager->persist($newTheme);
                            $this->entityManager->flush();
                        }

                    }


                    $authors = $manga['authors'];
                    $author = $authors[0];

                    $result = $this->authorsRepository->findOneByName($author['name']);

                    if ($result == 0) {
                        $newAuthor->setName($author['name']);
                        $newAuthor->setIdApi($author['mal_id']);
                        $newAuthor->setCreatedAt($createdAt);
                        $newAuthor->setUpdatedAt($createdAt);

                        $this->entityManager->persist($newAuthor);
                        $this->entityManager->flush();
                    }

                    if (count($authors) > 1) {
                        $illustrator = $authors[1];

                        $result = $this->illustratorRepository->findByName($illustrator['name']);

                        if ($result == 0) {
                            $newIllustrator->setName($illustrator['name']);
                            $newIllustrator->setIdApi($illustrator['mal_id']);
                            $newIllustrator->setCreatedAt($createdAt);
                            $newIllustrator->setUpdatedAt($createdAt);

                            $this->entityManager->persist($newIllustrator);
                            $this->entityManager->flush();
                        }
                    }
                    $newManga->setName($manga['title']);
                    $newManga->setImg($manga['images']['webp']['large_image_url']);

                    if ($manga['chapters'] == null) {
                        $chapters = 0;
                    } else {
                        $chapters = $manga['chapters'];
                    }
                    $newManga->setChapters($chapters);

                    if ($manga['volumes'] == null) {
                        $volumes = 0;
                    } else {
                        $volumes = $manga['volumes'];
                    }
                    $newManga->setVolumes($volumes);

                    $newManga->setPublished($manga['published']['string']);

                    $newManga->setSynopsis($manga['synopsis']);

                    $newManga->setIdApi($manga['mal_id']);


                    $newManga->setCreatedAt($createdAt);
                    $newManga->setUpdatedAt($createdAt);

                    $this->entityManager->persist($newManga);
                    $this->entityManager->flush();
                }




            }
            $page += 1;
            sleep(1);
        }

        dd($pagination, $pages);

        return $this->render('scrap/index.html.twig', [
            'controller_name' => 'ScrapController',
        ]);
    }
}
