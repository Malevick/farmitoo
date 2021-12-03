<?php

declare(strict_types=1);

namespace App\Calculator;

use App\Entity\Order;

class VatCalculator
{
    /**
     * @param Order $order
     *
     * @return int
     */
    public function calculate(Order $order): int
    {
        $vat = 0;

        foreach ($order->getItems() as $itemKey => $item) {
            $vat += (($item->getProduct()->getBrand()->getVat() * $item->getProduct()->getPrice() / 100) * $item->getQuantity());
        }

        return $vat;
    }
}
