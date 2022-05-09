<?php

namespace App\Controller;

use App\Entity\FlashInfo;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    private $entityManager;

    /**
     * ContactController constructor.
     * @param $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function index(Request $request): Response
    {
        $flashinfos = $this->entityManager->getRepository(FlashInfo::class)->findBy(['isVisible' => true], ['datePublished'=>'DESC']);
        $notification = null;

        $from_name = $request->get('from_name');
        $from_email = $request->get('from_email');
        $from_phone = $request->get('from_phone');
        $subject = $request->get('subject');
        $content = $request->get('content');

        $to_email = "admin@men-deco.org";
        $to_name = "Courriel DECO";

        if(!$from_name or !$from_email or !$from_phone or !$subject or !$content) {
            $notification = "Veuillez renseigner tous les champs";
        }
        else {
            $mail = new \FormContact();
            $mail->send($to_email, $to_name, $from_name, $from_email, $from_phone, $subject, $content);
            $notification = "Votre message nous a été correctement transmis.";
        }


        return $this->render('contact/index.html.twig', [
            'notification' => $notification,
            'flashinfos' => $flashinfos,
        ]);
    }
}
