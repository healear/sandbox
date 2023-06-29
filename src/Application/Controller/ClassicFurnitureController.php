<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Application\Proves\FurnitureFactoryInterface;
use App\Domain\VolumeSize;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ClassicFurnitureController extends AbstractController
{
    public function __construct(private FurnitureFactoryInterface $furnitureFactory)
    {
    }

    #[Route('/classic', name: 'ClassicFurniture')]
    public function index(): Response
    {
        $chairPrice = $this->furnitureFactory->getChair(new VolumeSize(1.0, 1.0, 1.0))->calcPrice();

        return $this->render('/classic_furniture_page.twig', ['chair_price'=>$chairPrice]);
    }
}