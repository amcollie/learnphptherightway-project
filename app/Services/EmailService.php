<?php

declare(strict_types=1);

namespace App\Services;

class EmailService
{
    public function send(array $customer, string $template): bool
    {
        return true;
    }
}