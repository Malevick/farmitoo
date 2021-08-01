<?php

declare(strict_types=1);

namespace App\Entity;

abstract class AbstractShippingCalculation implements ShippingCalculationInterface
{
    /**
     * @var int
     */
    protected int $shippingFees;

    public function __construct(int $shippingFees)
    {
        $this->shippingFees = $shippingFees;
    }

    /**
     * {@inheritDoc}
     */
    public function getShippingFees(): int
    {
        return $this->shippingFees;
    }
}
