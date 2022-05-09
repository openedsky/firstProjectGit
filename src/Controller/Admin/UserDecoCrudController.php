<?php

namespace App\Controller\Admin;

use App\Entity\UserDeco;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserDecoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return UserDeco::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Utilisateur')
            ->setEntityLabelInPlural('Utilisateurs')
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des utilisateurs')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un utilisateur')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un utilisateur')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Consulter un utilisateur')
            ->setEntityPermission('ROLE_USER')
            ;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new("firstname", "Prénom"),
            TextField::new("lastname", "Nom"),
            EmailField::new("email", "Email"),
            BooleanField::new("isActive", 'Actif ?'),
        ];
    }

}
