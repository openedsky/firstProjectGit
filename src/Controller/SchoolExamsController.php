<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Entity\Post;
use App\Entity\Release;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SchoolExamsController extends AbstractController
{
    private $entityManager;

    /**
     * SchoolExamsController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/examens-scolaires/bac", name="school_exams_bac")
     */
    public function bac(Request $request): Response
    {
         $limit = 3;
         $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);


        return $this->render('school_exams/bac.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/procedure-d-inscription", name="school_exams_bac_procedure")
     */
    public function bac_procedure(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);


        return $this->render('school_exams/bac_procedure.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-officiel", name="school_exams_bac_co")
     */
    public function bac_co(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);


        return $this->render('school_exams/bac_co.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-officiel/edition-de-documents-candidats", name="school_exams_bac_co_edition_cand")
     */
    public function bac_co_edition_cand(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);


        return $this->render('school_exams/bac_co_edition_cand.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-officiel/edition-de-listings", name="school_exams_bac_co_edition_admin")
     */
    public function bac_co_edition_admin(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bac_co_edition_listing.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-libre", name="school_exams_bac_cl")
     */
    public function bac_cl(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bac_cl.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-libre/inscription", name="school_exams_bac_cl_register")
     */
    public function bac_cl_register(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bac_cl_register.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-libre/edition-de-fiches", name="school_exams_bac_cl_edition_cand")
     */
    public function bac_cl_edition_cand(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bac_cl_edition_cand.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bac/candidat-libre/edition-de-listings", name="school_exams_bac_cl_edition_admin")
     */
    public function bac_cl_edition_admin(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bac_cl_edition_listing.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }









    /**
     * @Route("/examens-scolaires/bepc", name="school_exams_bepc")
     */
    public function bepc(Request $request): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/procedure-d-inscription", name="school_exams_bepc_procedure")
     */
    public function bepc_procedure(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_procedure.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-officiel", name="school_exams_bepc_co")
     */
    public function bepc_co(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_co.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-officiel/edition-de-documents-candidats", name="school_exams_bepc_co_edition_cand")
     */
    public function bepc_co_edition_cand(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_co_edition_cand.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-officiel/edition-de-listings", name="school_exams_bepc_co_edition_admin")
     */
    public function bepc_co_edition_admin(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_co_edition_listing.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-libre", name="school_exams_bepc_cl")
     */
    public function bepc_cl(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_cl.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-libre/inscription", name="school_exams_bepc_cl_register")
     */
    public function bepc_cl_register(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_cl_register.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-libre/edition-de-fiches", name="school_exams_bepc_cl_edition_cand")
     */
    public function bepc_cl_edition_cand(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_cl_edition_cand.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/bepc/candidat-libre/edition-de-listings", name="school_exams_bepc_cl_edition_admin")
     */
    public function bepc_cl_edition_admin(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/bepc_cl_edition_listing.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/to/procedure-d-inscription", name="school_exams_to_procedure")
     */
    public function to_procedure(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/to_procedure.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }






    /**
     * @Route("/examens-scolaires/cepe", name="school_exams_cepe")
     */
    public function cepe(Request $request): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/procedure-d-inscription", name="school_exams_cepe_procedure")
     */
    public function cepe_procedure(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_procedure.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-officiel", name="school_exams_cepe_co")
     */
    public function cepe_co(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_co.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-officiel/edition-de-documents-candidats", name="school_exams_cepe_co_edition_cand")
     */
    public function cepe_co_edition_cand(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_co_edition_cand.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-officiel/edition-de-listings", name="school_exams_cepe_co_edition_admin")
     */
    public function cepe_co_edition_admin(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_co_edition_listing.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-libre", name="school_exams_cepe_cl")
     */
    public function cepe_cl(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_cl.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-libre/inscription", name="school_exams_cepe_cl_register")
     */
    public function cepe_cl_register(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_cl_register.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-libre/edition-de-fiches", name="school_exams_cepe_cl_edition_cand")
     */
    public function cepe_cl_edition_cand(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_cl_edition_cand.html.twig', [
            'posts_last' => $posts_last,
            'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/examens-scolaires/cepe/candidat-libre/edition-de-listings", name="school_exams_cepe_cl_edition_admin")
     */
    public function cepe_cl_edition_admin(): Response
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('school_exams/cepe_cl_edition_listing.html.twig', [
            'posts_last' => $posts_last,
'flashinfos' => $flashinfos,
        ]);
    }


}
