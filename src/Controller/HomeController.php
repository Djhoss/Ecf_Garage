<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Entity\Service;
use App\Entity\Temoignage;
use App\Form\TemoignageType;
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

        // Temoignage

        $temoignage = $this->entityManager->getRepository(Temoignage::class)->findAll();
        $showTemoignageForm = false;

    // Form Temoignage
        $newTemoignage = new Temoignage();
        $formTemoignage = $this->createForm(TemoignageType::class, $newTemoignage);


        $formTemoignage->handleRequest($request);
        if ($formTemoignage->isSubmitted() && $formTemoignage->isValid()) {
            // Traitement du formulaire et sauvegarde du témoignage
            $this->entityManager->persist($newTemoignage);
            $this->entityManager->flush();
            $this->addFlash('success', 'Votre témoignage a bien été envoyé');
            return $this->redirectToRoute('app_home');
        }


        // Contact form
        $message_accueil = new Message();
        $formContact = $this->createForm(MessageFormType::class, $message_accueil);

        $formContact->handleRequest($request);
        if ($formContact->isSubmitted() && $formContact->isValid()) {
            $message_accueil = $formContact->getData();
            $this->entityManager->persist($message_accueil);
            $this->entityManager->flush();
            $this->addFlash('success', 'Votre message a bien été envoyé');
            return $this->redirectToRoute('app_home');
        }
    
        

        return $this->render('home/index.html.twig', [
            'service' => $service,
            'temoignage' => $temoignage,
            'showTemoignageForm' => $showTemoignageForm,
            'formTemoignage' => $formTemoignage->createView(),
            'formContact' => $formContact->createView(),
        ]);
        
    }
}
