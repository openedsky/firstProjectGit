<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Form\AccountChangePasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AccountChangePasswordController extends AbstractController
{
    private $entityManager;

    /**
     * AccountChangePasswordController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/zone-deco/changer-mot-de-passe", name="account_change_password")
     */
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $notification = null;

        $user = $this->getUser();

        $form = $this->createForm(AccountChangePasswordType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $old_pwd = $form->get('old_password')->getData();
            if($encoder->isPasswordValid($user, $old_pwd)) {
                $new_pwd = $form->get('new_password')->getData();
                $password = $encoder->hashPassword($user, $new_pwd);

                $user->setPassword($password);
                $this->entityManager->flush();
                $notification = "Votre mot de passe a été mis à jour";
            } else {
                $notification = "Mot de passe actuel incorrect";
            }
        }

        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);


        return $this->render('account/password.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification,
            'flashinfos' => $flashinfos,
        ]);
    }
}
