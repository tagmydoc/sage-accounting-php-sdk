<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Enums\Method;

class GetContactTypesRequest extends SageRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/contact_types';
    }
}