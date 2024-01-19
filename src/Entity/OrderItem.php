<?php

namespace App\Entity;

use App\Repository\OrderItemRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderItemRepository::class)]
class OrderItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Order $itemOrder = null;

    #[ORM\ManyToOne(inversedBy: 'orderItems')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Product $itemProduct = null;

    #[ORM\Column]
    private ?int $itemQuantity = null;

    #[ORM\Column]
    private ?float $itemUnitPrice = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemOrder(): ?Order
    {
        return $this->itemOrder;
    }

    public function setItemOrder(?Order $itemOrder): static
    {
        $this->itemOrder = $itemOrder;

        return $this;
    }

    public function getItemProduct(): ?Product
    {
        return $this->itemProduct;
    }

    public function setItemProduct(?Product $itemProduct): static
    {
        $this->itemProduct = $itemProduct;

        return $this;
    }

    public function getItemQuantity(): ?int
    {
        return $this->itemQuantity;
    }

    public function setItemQuantity(int $itemQuantity): static
    {
        $this->itemQuantity = $itemQuantity;

        return $this;
    }

    public function getItemUnitPrice(): ?float
    {
        return $this->itemUnitPrice;
    }

    public function setItemUnitPrice(float $itemUnitPrice): static
    {
        $this->itemUnitPrice = $itemUnitPrice;

        return $this;
    }
}
