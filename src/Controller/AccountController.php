<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccountController extends AbstractController
{
    private $entityManager;

    /**
     * AccountController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/zone-deco/accueil", name="account_home")
     */
    public function index(): Response
    {
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('account/index.html.twig', [
        'flashinfos' => $flashinfos,
        ]);
    }
}
