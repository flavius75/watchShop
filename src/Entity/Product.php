<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(["getProducts"])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getProducts"])]
    private ?string $productBrand = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getProducts"])]
    private ?string $productModel = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(["getProducts"])]
    private ?string $productDescription = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getProducts"])]
    private ?string $productMovment = null;

    #[ORM\Column(length: 255)]
    #[Groups(["getProducts"])]
    private ?string $productGender = null;

    #[ORM\Column(nullable: true)]
    #[Groups(["getProducts"])]
    private ?array $productExtra = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 8, scale: 2)]
    #[Groups(["getProducts"])]
    private ?string $productPrice = null;

    #[ORM\Column(type: Types::SMALLINT)]
    #[Groups(["getProducts"])]
    private ?int $productStock = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(nullable: false)]    
    #[Groups(["getProducts"])]
    private ?Brand $brand = null;

    #[ORM\OneToMany(mappedBy: 'itemProduct', targetEntity: OrderItem::class)]
    private Collection $orderItems;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(["getProducts"])]
    private ?string $productImageUrl = null;

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

    public function getProductImageUrl(): ?string
    {
        return $this->productImageUrl;
    }

    public function setProductImageUrl(?string $productImageUrl): static
    {
        $this->productImageUrl = $productImageUrl;

        return $this;
    }
}
