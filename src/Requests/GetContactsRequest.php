<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Enums\Method;

class GetContactsRequest extends SageRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/contacts';
    }
}