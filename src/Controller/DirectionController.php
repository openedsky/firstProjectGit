<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DirectionController extends AbstractController
{
    private $entityManager;

    /**
     * DirectionController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/direction/historique", name="direction_historical")
     */
    public function historical(): Response
    {
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);
        return $this->render('direction/historical.html.twig', [
            'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/direction/mission", name="direction_assignment")
     */
    public function assignement(): Response
    {
         $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);
        return $this->render('direction/assignment.html.twig', [
            'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/direction/mot-de-la-directrice", name="direction_word_director")
     */
    public function word_director(): Response
    {
         $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);
        return $this->render('direction/word_director.html.twig', [
            'flashinfos' => $flashinfos,
        ]);
    }
}
