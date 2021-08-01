<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Entity\Order;

class ShippingCalculator
{
    /**
     * @param Order $order
     *
     * @return int
     */
    public function calculate(Order $order): int
    {
        return 0;
    }
}
