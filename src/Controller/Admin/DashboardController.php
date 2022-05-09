<?php

namespace App\Controller\Admin;

use App\Entity\FlashInfo;
use App\Entity\Partner;
use App\Entity\Post;
use App\Entity\Release;
use App\Entity\Slide;
use App\Entity\UserDeco;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use function Doctrine\Common\Cache\Psr6\get;

class DashboardController extends AbstractDashboardController
{

    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        $routeBuilder = $this->get(AdminUrlGenerator::class);
        return $this->redirect($routeBuilder->setController(PostCrudController::class)->generateUrl());
        //return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Site DECO Backend');
    }


    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Tableau de bord', 'fa fa-home');
        yield MenuItem::linkToCrud('Articles', 'fas fa-globe', Post::class);
        yield MenuItem::linkToCrud('Slides', 'fas fa-desktop', Slide::class);
        yield MenuItem::linkToCrud('Flash infos', 'fas fa-bell', FlashInfo::class);
        yield MenuItem::linkToCrud('Communiqués', 'fas fa-file', Release::class);
        yield MenuItem::linkToCrud('Partenaires', 'fas fa-users', Partner::class);
        yield MenuItem::linkToCrud('Utilisateurs', 'fas fa-user', UserDeco::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
