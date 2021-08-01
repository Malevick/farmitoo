<?php

declare(strict_types=1);

namespace App\Entity;

class Brand
{
    protected string $name;

    /**
     * @var ShippingCalculationInterface
     */
    protected ShippingCalculationInterface $shippingCalculation;

    /**
     * @var int
     */
    protected int $vat;

    /**
     * @param string                       $name
     * @param ShippingCalculationInterface $shippingCalculation
     * @param int                          $vat
     */
    public function __construct(string $name, ShippingCalculationInterface $shippingCalculation, int $vat)
    {
        $this->name = $name;
        $this->shippingCalculation = $shippingCalculation;
        $this->vat = $vat;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return ShippingCalculationInterface
     */
    public function getShippingCalculation(): ShippingCalculationInterface
    {
        return $this->shippingCalculation;
    }

    /**
     * @return int
     */
    public function getVat(): int
    {
        return $this->vat;
    }
}
