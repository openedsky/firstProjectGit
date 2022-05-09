<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use App\Entity\UserDeco;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegisterController extends AbstractController
{
    private $entityManager;

    /**
     * RegisterController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/36330ebd91d097174d09bf7b2aa0788bef6851a6", name="register")
     */
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $notification = null;

        $user = new UserDeco();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();


            $search_email = $this->entityManager->getRepository(UserDeco::class)->findBy(['email'=>$user->getEmail()]);

            if(!$search_email) {
                $password = $encoder->hashPassword($user, $user->getPassword());
                $user->setPassword($password);

                $this->entityManager->persist($user);
                $this->entityManager->flush();


                $mail = new \Mail();
                $user_fullname = $user->getFirstname()." ".$user->getLastname();
                $content = "Bonjour/Bonsoir <b>".$user_fullname."</b> <br><br>
                Vous recevez ce email parce que vous avez été ajouté(e) comme utilisateur sur le site web de la 
                <b>Direction des Examens et Concours (DECO)</b> du Ministère de l'Education Nationale et de 
                l'Alphabétisation (MENA). <br>
                Vous pouvez dès à présent vous connecter pour manager du contenu sur le site. <br><br>
                Bien Cordialement <br>
                l'administrateur du site.";
                $mail->send($user->getEmail(), $user_fullname, "Bienvenue sur le site de la Direction des Examens et Concours (DECO)", $content);

                $notification ="L'inscription s'est correctement déroulée";

                //return $this->redirectToRoute('confirm_register');
            } else {
                $notification ="L'email renseigné existe déjà.";
            }


        }

        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);

        return $this->render('register/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification,
            'flashinfos' => $flashinfos,
        ]);
    }
}
