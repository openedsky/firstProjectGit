<?php


namespace App\Service;


use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class PostSearchService
{
    private $requestStack;
    private $postRepo;
    private $pagination;

    /**
     * PostService constructor.
     * @param $requestStack
     * @param $postRepo
     * @param $pagination
     */
    public function __construct(RequestStack $requestStack, PostRepository $postRepo, PaginatorInterface $pagination)
    {
        $this->requestStack = $requestStack;
        $this->postRepo = $postRepo;
        $this->pagination = $pagination;
    }

    public function getPaginationPostSearch(String $req)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 20;
        $postQuery = $this->postRepo->findPostByName($req);

        return $this->pagination->paginate($postQuery, $page, $limit);
    }
}