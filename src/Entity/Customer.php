<?php

namespace App\Entity;

use App\Repository\CustomerRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CustomerRepository::class)]
class Customer
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $customerFirstname = null;

    #[ORM\Column(length: 50)]
    private ?string $customerLastname = null;

    #[ORM\Column(length: 50)]
    private ?string $customerPhone = null;

    #[ORM\Column(length: 255)]
    private ?string $customerEmail = null;

    #[ORM\Column(length: 255)]
    private ?string $customerAddress = null;

    #[ORM\Column(length: 50)]
    private ?string $customerCity = null;

    #[ORM\Column(length: 50)]
    private ?string $customerZipcode = null;

    #[ORM\Column(length: 50)]
    private ?string $customerCountry = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCustomerFirstname(): ?string
    {
        return $this->customerFirstname;
    }

    public function setCustomerFirstname(string $customerFirstname): static
    {
        $this->customerFirstname = $customerFirstname;

        return $this;
    }

    public function getCustomerLastname(): ?string
    {
        return $this->customerLastname;
    }

    public function setCustomerLastname(string $customerLastname): static
    {
        $this->customerLastname = $customerLastname;

        return $this;
    }

    public function getCustomerPhone(): ?string
    {
        return $this->customerPhone;
    }

    public function setCustomerPhone(string $customerPhone): static
    {
        $this->customerPhone = $customerPhone;

        return $this;
    }

    public function getCustomerEmail(): ?string
    {
        return $this->customerEmail;
    }

    public function setCustomerEmail(string $customerEmail): static
    {
        $this->customerEmail = $customerEmail;

        return $this;
    }

    public function getCustomerAddress(): ?string
    {
        return $this->customerAddress;
    }

    public function setCustomerAddress(string $customerAddress): static
    {
        $this->customerAddress = $customerAddress;

        return $this;
    }

    public function getCustomerCity(): ?string
    {
        return $this->customerCity;
    }

    public function setCustomerCity(string $customerCity): static
    {
        $this->customerCity = $customerCity;

        return $this;
    }

    public function getCustomerZipcode(): ?string
    {
        return $this->customerZipcode;
    }

    public function setCustomerZipcode(string $customerZipcode): static
    {
        $this->customerZipcode = $customerZipcode;

        return $this;
    }

    public function getCustomerCountry(): ?string
    {
        return $this->customerCountry;
    }

    public function setCustomerCountry(string $customerCountry): static
    {
        $this->customerCountry = $customerCountry;

        return $this;
    }
}
