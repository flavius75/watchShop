<?php

namespace App\Service;

use App\Repository\ProductRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductService {
	public $repositoryProduct;
	
	public function __construct(ManagerRegistry $registry) {
		$this->repositoryProduct = new ProductRepository($registry);
	}

	public function list() {
  
    $list_name = [];
		$data = $this->repositoryProduct->findAll();

		foreach ($data as $key => $value) {
			array_push($list_name, [
        "productName" => $value->getProductName(),
        "productLine" => $value->getProductLine(),
        "productVendor" => $value->getProductVendor(),
        "buyPrice" => $value->getBuyPrice(),
      ]);
		}

    return $list_name;
	}
}