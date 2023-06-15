<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Message;
use App\Form\MessageFormType;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {

        $message = new Message();
        $form = $this->createForm(MessageFormType::class, $message);



        return $this->render('home/index.html.twig', [
            'form' => $form->createView(),
            
        ]);
    }
}
