<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $productBrand = null;

    #[ORM\Column(length: 255)]
    private ?string $productModel = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $productDescription = null;

    #[ORM\Column(length: 255)]
    private ?string $productMovment = null;

    #[ORM\Column(length: 255)]
    private ?string $productGender = null;

    #[ORM\Column(nullable: true)]
    private ?array $productExtra = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2)]
    private ?string $productPrice = null;

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $productStock = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Brand $brand = null;

    #[ORM\OneToMany(mappedBy: 'itemProduct', targetEntity: OrderItem::class)]
    private Collection $orderItems;

    public function __construct()
    {
        $this->orderItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductBrand(): ?string
    {
        return $this->productBrand;
    }

    public function setProductBrand(string $productBrand): static
    {
        $this->productBrand = $productBrand;

        return $this;
    }

    public function getProductModel(): ?string
    {
        return $this->productModel;
    }

    public function setProductModel(string $productModel): static
    {
        $this->productModel = $productModel;

        return $this;
    }

    public function getProductDescription(): ?string
    {
        return $this->productDescription;
    }

    public function setProductDescription(string $productDescription): static
    {
        $this->productDescription = $productDescription;

        return $this;
    }

    public function getProductMovment(): ?string
    {
        return $this->productMovment;
    }

    public function setProductMovment(string $productMovment): static
    {
        $this->productMovment = $productMovment;

        return $this;
    }

    public function getProductGender(): ?string
    {
        return $this->productGender;
    }

    public function setProductGender(string $productGender): static
    {
        $this->productGender = $productGender;

        return $this;
    }

    public function getProductExtra(): ?array
    {
        return $this->productExtra;
    }

    public function setProductExtra(?array $productExtra): static
    {
        $this->productExtra = $productExtra;

        return $this;
    }

    public function getProductPrice(): ?string
    {
        return $this->productPrice;
    }

    public function setProductPrice(string $productPrice): static
    {
        $this->productPrice = $productPrice;

        return $this;
    }

    public function getProductStock(): ?int
    {
        return $this->productStock;
    }

    public function setProductStock(int $productStock): static
    {
        $this->productStock = $productStock;

        return $this;
    }

    public function getBrand(): ?Brand
    {
        return $this->brand;
    }

    public function setBrand(?Brand $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return Collection<int, OrderItem>
     */
    public function getOrderItems(): Collection
    {
        return $this->orderItems;
    }

    public function addOrderItem(OrderItem $orderItem): static
    {
        if (!$this->orderItems->contains($orderItem)) {
            $this->orderItems->add($orderItem);
            $orderItem->setItemProduct($this);
        }

        return $this;
    }

    public function removeOrderItem(OrderItem $orderItem): static
    {
        if ($this->orderItems->removeElement($orderItem)) {
            // set the owning side to null (unless already changed)
            if ($orderItem->getItemProduct() === $this) {
                $orderItem->setItemProduct(null);
            }
        }

        return $this;
    }
}
