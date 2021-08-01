<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Brand;
use App\Entity\Item;
use App\Entity\Order;
use App\Entity\Product;
use App\Entity\ShippingCalculationByOrder;
use App\Entity\ShippingCalculationBySlice;
use PHPUnit\Framework\TestCase;

class OrderTest extends TestCase
{
    public function testGetItemByBrands()
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

        $this->assertSame(
            [
                'Farmitoo' => [$item1],
                'Gallagher' => [$item2, $item3],
            ],
            $order->getItemsByBrands()
        );
    }
}
