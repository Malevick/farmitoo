<?php

declare(strict_types=1);

namespace App\Tests\Unit\Entity;

use App\Entity\Brand;
use App\Entity\Product;
use App\Entity\ShippingCalculationByOrder;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function testGetTitle()
    {
        $farmitooBrand = new Brand('Farmitoo', new ShippingCalculationByOrder(1200), 20);

        $product = new Product('Cuve à gasoil', 100, $farmitooBrand);

        $this->assertSame('Cuve à gasoil', $product->getTitle());
    }
}
