<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Service\ProductService;

class ProductController extends AbstractController
{
    public $service;
    function __construct(ManagerRegistry $registry) {
		$this->service = new ProductService($registry);
	}

    #[Route('/product', name: 'app_product')]
    public function index(): JsonResponse
    {
        $data = $this->service->list();

        return $this->json([
            'data' => $data
        ]);
    }
}
