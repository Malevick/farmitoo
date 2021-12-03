<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Entity\Order;
use App\Entity\ShippingCalculationBySlice;

class ShippingCalculator
{
    /**
     * @param Order $order
     *
     * @return int
     */
    public function calculate(Order $order): int
    {
        $shippingTotal = 0;

        foreach ($order->getItems() as $itemKey => $item) {
            $itemShipping = 0;
            //Si la méthode de calcul se fait par tranche
            if ($item->getProduct()->getBrand()->getShippingCalculation() instanceof ShippingCalculationBySlice) {
                $shippingFees = $item->getProduct()->getBrand()->getShippingCalculation()->getShippingFees();
                $shippingSlice = $item->getProduct()->getBrand()->getShippingCalculation()->getCountItemBySlice();
                $itemShipping = $shippingFees * intval(ceil($item->getQuantity() / $shippingSlice));
            }
            //Si la méthode de calcul est fixe
            else {
                $itemShipping = $item->getProduct()->getBrand()->getShippingCalculation()->getShippingFees();
            }
            $shippingTotal += $itemShipping;
        }

        return $shippingTotal;
    }
}
