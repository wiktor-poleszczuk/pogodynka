<?php

namespace App\Controller;

use App\Entity\Location;
use App\Repository\MeasurementRepository;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class WeatherController extends AbstractController
{
    #[Route('/weather/{locality}', name: 'app_weather', requirements: ['locality' => '[a-zA-Z]+'])]
    public function city(
        #[MapEntity(mapping: ['locality' => 'locality'])]
        Location $location,
        MeasurementRepository $repository
    ): Response
    {
        $measurements = $repository->findByLocation($location);

        return $this->render('weather/city.html.twig', [
            'location' => $location,
            'measurements' => $measurements,
            'controller_name' => 'WeatherController',
        ]);
    }

}


