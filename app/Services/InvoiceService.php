<?php

declare(strict_types=1);

namespace App\Services;

class InvoiceService
{
    public function __construct(
        protected SalesTaxService $salesTaxService,
        protected PaymentGatewayService $gatewayService,
        protected EmailService $emailService
    )
    {

    }

    public function process(array $customer, float $amount): bool
    {
        $tax = $this->salesTaxService->calculateTax($amount, $customer);

        if (!$this->gatewayService->charge($customer, $amount, $tax)) {
            return false;
        }

        $this->emailService->send($customer, 'receipt');

        return true;
    }
}