<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Enums\Method;

class GetCountriesRequest extends SageRequest
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/countries';
    }
}