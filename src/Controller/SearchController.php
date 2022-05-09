<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Entity\Post;
use App\Service\PostSearchService;
use App\Service\PostService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{

    private $entityManager;

    /**
     * SearchController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/search", name="app_search")
     */
    public function index(): Response
    {
        return $this->render('search/index.html.twig', [
            'controller_name' => 'SearchController',
        ]);
    }

    public function searchBar()
    {
        $form = $this->createFormBuilder()
            ->setAction($this->generateUrl('search'))
            ->add('form', FormType::class, [
                'label' => false,
                'attr' => [
                    'class' => 'search-form',
                ]
            ])
            ->add('query', TextType::class, [
                'label' => false,
                'attr' => [
                    'type' => 'search',
                    'placeholder' => 'Entrez un mot-clé'
                ]
            ])
            ->add('recherche', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-warning'
                ]
            ])
            ->getForm();
        return $this->render('search/searchBar.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/recherche-swift", name="search_swift")
     * @param Request $request
     */
    public function search_home(PostSearchService $postSearchService, Request $request)
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        $query = $request->request->get('query');
        $articles = $postSearchService->getPaginationPostSearch($query);

        //dd($request->request->get('query'));

        //$query2 = $request->request->get('query');
        //dd($query);
        /*if($query !== null) {
           // $articles = $this->entityManager->getRepository(Post::class)->findPostByName($query);
            $articles = $postSearchService->getPaginationPostSearch($query);
        } else {
            $articles = $postSearchService->getPaginationPostSearch($request->request->get('query'));
        }*/
        return $this->render('search/index.html.twig', [
            'articles' => $articles,
            'posts_last' => $posts_last,
            'flashinfos' => $flashinfos,
        ]);
    }

    /**
     * @Route("/recherche", name="search")
     * @param Request $request
     */
    public function search(PostService $postService, Request $request)
    {
        $limit = 3;
        $posts_last = $this->entityManager->getRepository(Post::class)->findBy(['isVisible' => true,],
            ['datePublished' => 'DESC'], $limit);
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);


        $query = $request->request->get('form')['query'];

        if($query) {
           // $articles = $this->entityManager->getRepository(Post::class)->findPostByName($query);
            $articles = $postService->getPaginationPost($query);
        }
        return $this->render('search/index.html.twig', [
            'articles' => $articles,
            'posts_last' => $posts_last,
            'flashinfos' => $flashinfos,
        ]);
    }
}
