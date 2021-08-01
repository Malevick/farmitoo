<?php

declare(strict_types=1);

namespace App\Entity;

class Product
{
    /**
     * @var string
     */
    protected string $title;

    /**
     * @var int
     */
    protected int $price;

    /**
     * @var Brand
     */
    protected Brand $brand;

    /**
     * @param string $title
     * @param int    $price
     * @param Brand  $brand
     */
    public function __construct(string $title, int $price, Brand $brand)
    {
        $this->title = $title;
        $this->price = $price;
        $this->brand = $brand;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return Brand
     */
    public function getBrand(): Brand
    {
        return $this->brand;
    }
}
