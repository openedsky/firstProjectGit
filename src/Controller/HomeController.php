<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Entity\Partner;
use App\Entity\Post;
use App\Entity\Slide;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private $entityManager;

    /**
     * HomeController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/", name="home")
     */
    public function index(Request $request): Response
    {
        $limit = 10;
        $posts = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC'], $limit);
        $partners = $this->entityManager->getRepository(Partner::class)->findBy(['isVisible' => true]);
        $slides = $this->entityManager->getRepository(Slide::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('home/index.html.twig', [
            'posts' => $posts,
            'partners' => $partners,
            'slides' => $slides,
            'flashinfos' => $flashinfos,
        ]);
    }
}
