<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\BrandRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Response;



class BrandController extends AbstractController
{
   
    #[Route('/api/public/brands', name: 'brands_all', methods: ['GET'])]
    public function getAllBrands(BrandRepository $brandRepository, SerializerInterface $serializer, Request $request): JsonResponse
    {
        $page = $request->get('page', 1);
        $limit = $request->get('limit', 4);

        $brandList = $brandRepository->findAll();

        $jsonBrandList = $serializer->serialize($brandList, 'json', ['groups' => 'getProducts']);
        return new JsonResponse($jsonBrandList, Response::HTTP_OK, [], true);
    }
}
