<?php

declare(strict_types=1);

namespace App\Applier;

use App\Entity\Order;

class PromotionApplier
{
    public function apply(Order $order, array $promotions = []): void
    {
        usort($promotions, function ($a, $b) {
            return $a->getCreationDate()->getTimeStamp() - $b->getCreationDate()->getTimeStamp();
        });
        foreach ($promotions as $promotion) {
            if ($promotion->isApplicable($order)) {
                $order->setPromotionReduction($promotion->getReduction());
                break;
            }
        }
    }
}
