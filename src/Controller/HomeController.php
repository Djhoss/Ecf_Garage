<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Entity\Service;
use App\Form\MessageFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;


class HomeController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }


    #[Route('/', name: 'app_home')]
    public function index(Request $request)
    {
        // Service

        $service = $this->entityManager->getRepository(Service::class)->findAll();
        



        // Contact form
        $message_accueil = new Message();
        $form = $this->createForm(MessageFormType::class, $message_accueil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$message` variable has also been updated
            $message_accueil = $form->getData();
            $this->entityManager->persist($message_accueil);
            $this->entityManager->flush();
            $this->addFlash('success', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('home/index.html.twig', [
            'service' => $service,
            'form' => $form->createView(),
            
        ]);


    }
}
