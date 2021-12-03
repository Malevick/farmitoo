<?php

declare(strict_types=1);

namespace App\Entity;

use App\Entity\Order;

class Promotion
{
    /**
     * @var int
     */
    protected int $reduction;

    /**
     * @var \DateTimeInterface
     */
    protected ?\DateTimeInterface $startDate = null;

    /**
     * @var \DateTimeInterface
     */
    protected ?\DateTimeInterface $endDate = null;

    /**
     * @var \DateTimeInterface
     */
    protected ?\DateTimeInterface $creationDate = null;

    /**
     * @var int
     */
    protected int $minAmount = 0;

    /**
     * @var int
     */
    protected int $minProductsQuantity = 0;

    /**
     * @param int $reduction
     */
    public function __construct(int $reduction)
    {
        $this->reduction = $reduction;
    }

    /**
     * @return int
     */
    public function getReduction(): int
    {
        return $this->reduction;
    }

    /**
     * @param int $reduction
     */
    public function setReduction(int $reduction): void
    {
        $this->reduction = $reduction;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param \DateTimeInterface $startDate
     */
    public function setStartDate(?\DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param \DateTimeInterface $endDate
     */
    public function setEndDate(?\DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    /**
     * @param \DateTimeInterface $creationDate
     */
    public function setCreationDate(?\DateTimeInterface $creationDate): void
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return int
     */
    public function getMinAmount(): int
    {
        return $this->minAmount;
    }

    /**
     * @param int $minAmount
     */
    public function setMinAmount(int $minAmount): void
    {
        $this->minAmount = $minAmount;
    }

    /**
     * @return int
     */
    public function getMinProductsQuantity(): int
    {
        return $this->minProductsQuantity;
    }

    /**
     * @param int $minProductsQuantity
     */
    public function setMinProductsQuantity(int $minProductsQuantity): void
    {
        $this->minProductsQuantity = $minProductsQuantity;
    }

    /**
     * @param Order $order
     */
    public function isApplicable(Order $order): bool
    {
        if ($this->startDate && new \DateTime() < $this->startDate) {
            return false;
        }

        if ($this->endDate && new \DateTime() > $this->endDate) {
            return false;
        }

        if ($order->getPrice() < $this->minAmount) {
            return false;
        }

        if ($this->minProductsQuantity > 0) {
            $totalProducts = 0;

            foreach ($order->getItems() as $item) {
                $totalProducts += $item->getQuantity();
            }

            if ($totalProducts < $this->minProductsQuantity) {
                return false;
            }
        }

        return true;
    }
}
