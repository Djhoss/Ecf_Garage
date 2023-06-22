<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Car;
use App\Entity\Horaire;
use Doctrine\ORM\EntityManagerInterface;

class CarController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;

    }

    #[Route('/nos-cars', name: 'app_car')]
    public function index(): Response
    {
        $car = $this->entityManager->getRepository(Car::class)->findAll();

        // Horaire 

        $horaire = $this->entityManager->getRepository(Horaire::class)->findAll();

        return $this->render('car/index.html.twig', [
            'car' => $car,
            'horaire' => $horaire,
        ]);
    }

    #[Route('/car/{slug}', name: 'car')]
    public function show($slug): Response
    {
        // Horaire 
        $horaire = $this->entityManager->getRepository(Horaire::class)->findAll();

        // Car

        $car = $this->entityManager->getRepository(Car::class)->findOneBySlug($slug);

        if (!$car) {
            return $this->redirectToRoute('app_car');
        }

        return $this->render('car/show.html.twig', [
            'car' => $car,
            'horaire' => $horaire,
        ]);
    }
}
