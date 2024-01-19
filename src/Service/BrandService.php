<?php

namespace App\Service;

use App\Repository\BrandRepository;
use Doctrine\Persistence\ManagerRegistry;

class BrandService {
	public $repositoryBrand;
	
	public function __construct(ManagerRegistry $registry) {
		$this->repositoryBrand = new BrandRepository($registry);
	}

	public function list() {
  
    $list_name = [];
		$data = $this->repositoryBrand->findAll();

		foreach ($data as $key => $value) {
			array_push($list_name, [
        "brandName" => $value->getBrandName(),
        
      ]);
		}

    return $list_name;
	}
}