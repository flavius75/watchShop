<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    public function __construct(UserPasswordHasherInterface $userPasswordHasher)
    {
        $this->userPasswordHasher = $userPasswordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        /// Création d'un user "normal"
        $user = new User();
        $user->setEmail("user@mail.com");
        $user->setRoles(["ROLE_USER"]);
        $user->setPassword($this->userPasswordHasher->hashPassword($user, "password"));
        $manager->persist($user);
        
        // Création d'un user admin
        $userAdmin = new User();
        $userAdmin->setEmail("admin@mail.com");
        $userAdmin->setRoles(["ROLE_ADMIN"]);
        $userAdmin->setPassword($this->userPasswordHasher->hashPassword($userAdmin, "password"));
        $manager->persist($userAdmin);

        $listBrands = [];
        for ($i = 0; $i < 10; $i++) {
            // Création de l'auteur lui-même.
            $brand = new Brand();
            $brand->setBrandName("Marque " . $i);
            $manager->persist($brand);

            $listBrand[] = $brand;
        }

        for ($i = 0; $i < 20; $i++) {
            $product = new Product();
            $product->setProductModel("Model " . $i);
            $product->setProductDescription("Description");
            $product->setProductMovment("Automatic");
            $product->setProductGender("Homme");
            $product->setProductPrice(mt_rand(10, 900));
            $product->setProductStock(mt_rand(1, 20));
            $product->setProductBrand("Marque " . $i);
            $product->setBrand($listBrand[array_rand($listBrand)]);
            $manager->persist($product);
        }

        $manager->flush();
    }
}
