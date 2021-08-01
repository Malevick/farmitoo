<?php

declare(strict_types=1);

namespace App\Entity;

class ShippingCalculationBySlice extends AbstractShippingCalculation
{
    /**
     * @var int
     */
    protected int $countItemBySlice;

    /**
     * @param int $shippingFees
     * @param int $countItemBySlice
     */
    public function __construct(int $shippingFees, int $countItemBySlice)
    {
        parent::__construct($shippingFees);
        $this->countItemBySlice = $countItemBySlice;
    }

    /**
     * @return int
     */
    public function getCountItemBySlice(): int
    {
        return $this->countItemBySlice;
    }
}
