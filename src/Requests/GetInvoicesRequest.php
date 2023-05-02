<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Enums\Method;

class GetInvoicesRequest extends SageRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/sales_invoices';
    }
}