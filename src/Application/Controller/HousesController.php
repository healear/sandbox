<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Application\Proves\HouseBuilderDirectorInterface;
use App\Domain\Entity\House\Structure\Walls\Material;
use App\Domain\Entity\House\Structure\Walls\Walls;
use App\Domain\VolumeSize;
use App\Infrastructure\Proves\ClassicFurnitureFactory;
use App\Infrastructure\Proves\ModernFurnitureFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HousesController extends AbstractController
{
    private const STOCK_ILLUMINATION = 1.0;

    public function __construct(
        private ModernFurnitureFactory $modernFurnitureFactory,
        private ClassicFurnitureFactory $classicFurnitureFactory,
        private HouseBuilderDirectorInterface $builderDirector,
    ) {
    }

    #[Route('/houses', name: 'Houses')]
    public function index(): Response
    {
        $stockSize = new VolumeSize(1.0, 1.0, 1.0);
        $stockWalls = new Walls(
            Material::brick(),
            [
                $stockSize,
                $stockSize,
                $stockSize,
                $stockSize,
            ],
        );

        $classicChair = $this->classicFurnitureFactory->getChair($stockSize);
        $classicLamp = $this->classicFurnitureFactory->getLamp($stockSize, self::STOCK_ILLUMINATION);

        $modernChair = $this->modernFurnitureFactory->getChair($stockSize);
        $modernLamp = $this->modernFurnitureFactory->getLamp($stockSize, self::STOCK_ILLUMINATION);

        $modernFullHousePrice = $this->builderDirector->buildFullHouse(
            $stockWalls,
            $modernLamp,
            $modernChair,
        )->calcOverallPrice();

        $modernLightHousePrice = $this->builderDirector->buildLightHouse(
            $stockWalls,
            $modernLamp,
        )->calcOverallPrice();

        $classicFullHousePrice = $this->builderDirector->buildFullHouse(
            $stockWalls,
            $classicLamp,
            $classicChair,
        )->calcOverallPrice();

        $classicLightHousePrice = $this->builderDirector->buildLightHouse(
            $stockWalls,
            $classicLamp,
        )->calcOverallPrice();

        return $this->render(
            'houses_page.twig',
            [
                'modern_house_price' => $modernFullHousePrice,
                'classic_house_price' => $classicFullHousePrice,
                'modern_light_house_price' => $modernLightHousePrice,
                'classic_light_house_price' => $classicLightHousePrice,
            ],
        );
    }
}