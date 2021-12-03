<?php

declare(strict_types=1);

namespace App\Tests\Unit\Applier;

use App\Entity\Brand;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\Promotion;
use App\Entity\Item;
use App\Entity\ShippingCalculationByOrder;
use App\Entity\ShippingCalculationBySlice;
use App\Applier\PromotionApplier;

use PHPUnit\Framework\TestCase;

class PromotionApplierTest extends TestCase
{
    public function testNoPromotionApply()
    {
        $farmitooBrand = new Brand('Farmitoo', new ShippingCalculationByOrder(1200), 20);
        $gallagherBrand = new Brand('Gallagher', new ShippingCalculationBySlice(1400, 2), 10);

        $order = new Order();
        $product1 = new Product('Cuve à gasoil', 10000, $farmitooBrand);
        $product2 = new Product('Electrificateur de clôture', 2500, $gallagherBrand);
        $product3 = new Product('Couveuse', 6000, $gallagherBrand);

        $item1 = new Item($product1, 10);
        $item2 = new Item($product2, 2);
        $item3 = new Item($product3, 1);

        $order->addItem($item1);
        $order->addItem($item2);
        $order->addItem($item3);

        $promotion1 = new Promotion(1200);
        $promotion1->setStartDate(new \DateTime('2021-08-01'));
        $promotion1->setEndDate(new \DateTime('2021-08-10'));
        $promotion1->setCreationDate(new \DateTime('2021-07-01'));
        $promotion1->setMinAmount(20000);

        $promotion2 = new Promotion(500);
        $promotion2->setCreationDate(new \DateTime('NOW'));
        $promotion2->setMinProductsQuantity(100);

        $promotionApplier = new PromotionApplier();
        $promotionApplier->apply($order, [$promotion1, $promotion2]);

        $this->assertSame(
            $order->getPromotionReduction(),
            0
        );
    }

    public function testOnlyThirdPromotionApply()
    {
        $farmitooBrand = new Brand('Farmitoo', new ShippingCalculationByOrder(1200), 20);
        $gallagherBrand = new Brand('Gallagher', new ShippingCalculationBySlice(1400, 2), 10);

        $order = new Order();

        $product1 = new Product('Cuve à gasoil', 10000, $farmitooBrand);
        $product2 = new Product('Electrificateur de clôture', 2500, $gallagherBrand);
        $product3 = new Product('Couveuse', 6000, $gallagherBrand);

        $item1 = new Item($product1, 10);
        $item2 = new Item($product2, 2);
        $item3 = new Item($product3, 1);

        $order->addItem($item1);
        $order->addItem($item2);
        $order->addItem($item3);

        $promotion1 = new Promotion(1200);
        $promotion1->setStartDate(new \DateTime('2021-08-01'));
        $promotion1->setEndDate(new \DateTime('2021-08-10'));
        $promotion1->setCreationDate(new \DateTime('2021-07-01'));
        $promotion1->setMinAmount(20000);

        $promotion2 = new Promotion(100);
        $promotion2->setCreationDate(new \DateTime('2021-10-01'));
        $promotion2->setMinProductsQuantity(4);

        $promotion3 = new Promotion(500);
        $promotion3->setCreationDate(new \DateTime('2021-08-01'));
        $promotion3->setMinProductsQuantity(5);

        $promotionApplier = new PromotionApplier();
        $promotionApplier->apply($order, [$promotion1, $promotion2, $promotion3]);

        $this->assertSame(
            $order->getPromotionReduction(),
            500
        );
    }

}
