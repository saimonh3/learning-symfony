<?php


namespace App\Message\Command;


class CreateOrder
{
    private $productId;
    private $productPrice;
    private $productName;

    public function __construct($productId, $productPrice)
    {
        $this->productId = $productId;
        $this->productPrice = $productPrice;
        $this->productName = 'iPhone';
    }

    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getProductPrice(): string
    {
        return $this->productPrice;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }
}