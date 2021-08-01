<?php

declare(strict_types=1);

namespace App\Factory;

use App\Entity\Item;
use App\Entity\Product;

class ItemFactory
{
    public function create(Product $product, int $quantity): Item
    {
        $item = new Item();

        $item->setProduct($product);
        $item->setQuantity($quantity);

        return $item;
    }
}
