<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Entity\Post;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EDemandesController extends AbstractController
{
    private $entityManager;

    /**
     * EDemandesController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/edemandes", name="edemandes")
     */
    public function index(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('e_demandes/index.html.twig', [
            'posts_last' => $posts_last,
            'flashinfos' => $flashinfos,
        ]);
    }
}
