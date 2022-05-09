<?php


namespace App\Service;


use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class PostService
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


    public function getPaginationPost(String $req=null)
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 5;
        $postQuery = $this->postRepo->findPostByPagination($req);

        return $this->pagination->paginate($postQuery, $page, $limit);
    }
}