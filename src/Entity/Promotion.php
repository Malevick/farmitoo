<?php

declare(strict_types=1);

namespace App\Entity;

class Promotion
{
    /**
     * @var int
     */
    protected int $reduction;

    /**
     * @param int $reduction
     */
    public function __construct(int $reduction)
    {
        $this->reduction = $reduction;
    }
}
