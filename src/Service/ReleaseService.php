<?php


namespace App\Service;


use App\Repository\ReleaseRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class ReleaseService
{

    private $requestStack;
    private $releaseRepo;
    private $pagination;

    /**
     * ReleaseService constructor.
     * @param $requestStack
     * @param $releaseRepo
     * @param $pagination
     */
    public function __construct(RequestStack $requestStack, ReleaseRepository $releaseRepo, PaginatorInterface $pagination)
    {
        $this->requestStack = $requestStack;
        $this->releaseRepo = $releaseRepo;
        $this->pagination = $pagination;
    }


    public function getPaginationRelease()
    {
        $request = $this->requestStack->getMainRequest();
        $page = $request->query->getInt('page', 1);
        $limit = 20;
        $releaseQuery = $this->releaseRepo->findReleaseByPagination();

        return $this->pagination->paginate($releaseQuery, $page, $limit);
    }
}