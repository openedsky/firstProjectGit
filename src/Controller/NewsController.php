<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Entity\Post;
use App\Entity\Release;
use App\Service\PostService;
use App\Service\ReleaseService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsController extends AbstractController
{
    private $entityManager;

    /**
     * NewsController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/actualite/communiques", name="news_releases")
     */
    public function index(ReleaseService $releaseService, Request $request): Response
    {
        $limit = 3;

        $releases = $releaseService->getPaginationRelease();

        //$releases = $this->entityManager->getRepository(Release::class)->findBy(['isVisible' => true], ['datePublished' => 'DESC']);
        $posts = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,], ['datePublished' => 'DESC']);
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('news/releases.html.twig', [
            'releases' => $releases,
            'posts_last' => $posts_last,
            'posts' => $posts,
            'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/actualite/actu-deco", name="news_deco")
     */
    public function news(PostService $postService, Request $request, PaginatorInterface $paginator): Response
    {
        //$req = null;
        $posts = $postService->getPaginationPost();
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('news/news_deco.html.twig', [
            'posts_last' => $posts_last,
            'posts' => $posts,
            'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/actualite/actu-deco/{slug}", name="news_deco_item")
     */
    public function new(Request $request, $slug): Response
    {
        $limit = 3;

        $post = $this->entityManager->getRepository(Post::class)->findOneBy(['slug' => $slug]);
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        if(!$post) {
            return $this->redirectToRoute("news_deco");
        }

        return $this->render('news/news_deco_item.html.twig', [
            'post' => $post,
            'posts_last' => $posts_last,
            'flashinfos' => $flashinfos,
        ]);

    }

    /**
     * @Route("/actualite/calendrier-des-examens-et-concours", name="news_calendar")
     */
    public function calendar(Request $request): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('news/calendar.html.twig', [
            'posts_last' => $posts_last,
            'flashinfos' => $flashinfos,
        ]);
    }

}
