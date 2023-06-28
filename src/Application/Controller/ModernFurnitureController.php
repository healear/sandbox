<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\Size;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ModernFurnitureController extends AbstractController
{
    public function __construct(private FurnitureFactoryInterface $furnitureFactory)
    {
    }

    #[Route('/modern', name: 'ModernFurniture')]
    public function index(): Response
    {
        $chairPrice = $this->furnitureFactory->getChair(new Size(1.0, 1.0, 1.0))->calcPrice();

        return $this->render('/furniture_page.twig', ['chair_price'=>$chairPrice]);
    }
}