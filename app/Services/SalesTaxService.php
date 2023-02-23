<?php

declare(strict_types=1);

namespace App\Services;

class SalesTaxService
{
    public function calculateTax(float $amount, array $customer): float
    {
        return $amount * (6.5 / 100);
    }
}