<?php

namespace App\Services;

class Currency
{
    protected $id;
    protected $name;
    protected $price;
    protected $imageUrl;
    protected $dailyChangePercent;

    public function __construct(int $id, string $name, float $price, string $imageUrl, float $dailyChangePercent)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->imageUrl = $imageUrl;
        $this->dailyChangePercent = $dailyChangePercent;
    }

    /**
     * Gets Id.
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Gets Name.
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Gets Price.
     *
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * Gets ImageUrl.
     *
     * @return string
     */
    public function getImageUrl(): string
    {
        return $this->imageUrl;
    }

    /**
     * Gets DailyChangePercent.
     *
     * @return float
     */
    public function getDailyChangePercent(): float
    {
        return $this->dailyChangePercent;
    }
}