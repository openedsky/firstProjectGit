<?php

namespace App\Controller\Admin;

use App\Entity\Partner;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PartnerCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Partner::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Partenaire')
            ->setEntityLabelInPlural('Partenaires')
            ->setPageTitle(Crud::PAGE_INDEX, 'Liste des partenaires')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un partenaire')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un partenaire')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Consulter un partenaire')
            ->setEntityPermission('ROLE_USER')
            ->setDefaultSort(['id' => 'DESC'])
            ->setDefaultSort(['id' => 'DESC', 'name' => 'ASC', 'datePublished' => 'DESC'])
            ;
    }

    public function createEntity(string $entityFqcn)
    {
        $partner = new Partner();
        $partner->setAuthor($this->getUser());
        $partner->setDatePublished(new \DateTime());
        $partner->setIsVisible(True);
        return $partner;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom du partenaire'),
            SlugField::new("slug")->setTargetFieldName("name"),
            ImageField::new("image", 'Image')
                ->setBasePath('assets/uploads/partners')
                ->setUploadDir('public/assets/uploads/partners')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('link', 'Lien'),
            IntegerField::new('priority', 'Priorité'),
            BooleanField::new("isVisible", 'Visible ?'),
            AssociationField::new('author', 'Auteur')->setDisabled(),
            DateTimeField::new('datePublished', 'Date de publication'),
        ];
    }
}
