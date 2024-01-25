<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\HttpFoundation\Request
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class ProductController extends AbstractController
{

    #[Route('/api/products', name: 'products_all', methods: ['GET'])]
    public function getAllProducts(ProductRepository $productRepository, SerializerInterface $serializer): JsonResponse
    {
        $productList = $productRepository->findAll();

        $jsonProductList = $serializer->serialize($productList, 'json', ['groups' => 'getProducts']);
        return new JsonResponse($jsonProductList, Response::HTTP_OK, [], true);
    }
    
    #[Route('/api/products/{id}', name: 'product_detail', methods: ['GET'])]
    public function getDetailProduct(int $id, ProductRepository $productRepository, SerializerInterface $serializer): JsonResponse
    {
        $product = $productRepository->find($id);
        if ($product) {
            $jsonProduct = $serializer->serialize($product, 'json', ['groups' => 'getProducts']);
            return new JsonResponse($jsonProduct, Response::HTTP_OK, [], true);
        }
        
        return new JsonResponse(null, Response::HTTP_NOT_FOUND);
    }

    #[Route('/api/products/{id}', name: 'product_delete', methods: ['DELETE'])]
    public function deleteProduct(int $id, ProductRepository $productRepository, EntityManagerInterface $em): JsonResponse
    {
        $product = $productRepository->find($id);
        
        $em->remove($product);
        $em->flush();

        return new JsonResponse(null, Response::HTTP_NO_CONTENT);
    }

    #[Route('/api/products/', name: 'product_create', methods: ['POST'])]
    public function createProduct(Request $request, SerializerInterface $serializer, EntityManagerInterface $em, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        $product = $serializer->deserialize($request->getContent(), Product::class, 'json');
        $em->persist($product);
        $em->flush();

        $jsonProduct = $serializer->serialize($product, 'json', ['groups' => 'getProducts']);

        $location = $urlGenerator->generate('product_detail', ['id' => $product->getId()], UrlGeneratorInterface::ABSOLUTE_URL);

        return new JsonResponse($jsonProduct, Response::HTTP_CREATED, ["Location" => $location], true);
    }


}