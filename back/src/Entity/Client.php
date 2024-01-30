<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $clientFirstname = null;

    #[ORM\Column(length: 255)]
    private ?string $clientLastname = null;

    #[ORM\Column(length: 255)]
    private ?string $clientPhone = null;

    #[ORM\Column(length: 255)]
    private ?string $clientEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $clientAddress = null;

    #[ORM\Column(length: 255)]
    private ?string $clientCity = null;

    #[ORM\Column(length: 255)]
    private ?string $clientZipcode = null;

    #[ORM\Column(length: 255)]
    private ?string $clientCountry = null;

    #[ORM\OneToMany(mappedBy: 'orderClient', targetEntity: Order::class)]
    private Collection $orders;

    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getClientFirstname(): ?string
    {
        return $this->clientFirstname;
    }

    public function setClientFirstname(string $clientFirstname): static
    {
        $this->clientFirstname = $clientFirstname;

        return $this;
    }

    public function getClientLastname(): ?string
    {
        return $this->clientLastname;
    }

    public function setClientLastname(string $clientLastname): static
    {
        $this->clientLastname = $clientLastname;

        return $this;
    }

    public function getClientPhone(): ?string
    {
        return $this->clientPhone;
    }

    public function setClientPhone(string $clientPhone): static
    {
        $this->clientPhone = $clientPhone;

        return $this;
    }

    public function getClientEmail(): ?string
    {
        return $this->clientEmail;
    }

    public function setClientEmail(string $clientEmail): static
    {
        $this->clientEmail = $clientEmail;

        return $this;
    }

    public function getClientAddress(): ?string
    {
        return $this->clientAddress;
    }

    public function setClientAddress(string $clientAddress): static
    {
        $this->clientAddress = $clientAddress;

        return $this;
    }

    public function getClientCity(): ?string
    {
        return $this->clientCity;
    }

    public function setClientCity(string $clientCity): static
    {
        $this->clientCity = $clientCity;

        return $this;
    }

    public function getClientZipcode(): ?string
    {
        return $this->clientZipcode;
    }

    public function setClientZipcode(string $clientZipcode): static
    {
        $this->clientZipcode = $clientZipcode;

        return $this;
    }

    public function getClientCountry(): ?string
    {
        return $this->clientCountry;
    }

    public function setClientCountry(string $clientCountry): static
    {
        $this->clientCountry = $clientCountry;

        return $this;
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): static
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setOrderClient($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): static
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getOrderClient() === $this) {
                $order->setOrderClient(null);
            }
        }

        return $this;
    }
}
