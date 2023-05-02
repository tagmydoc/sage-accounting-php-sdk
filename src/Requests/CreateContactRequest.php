<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

class CreateContactRequest extends SageRequest implements HasBody
{
    use HasJsonBody;
    
    protected Method $method = Method::POST;

    public function resolveEndpoint(): string
    {
        return '/contacts';
    }
}