<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;

class UpdateContactRequest extends SageRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;

    protected function __construct(protected string $id, protected array $parameters = [])
    {
        parent::__construct($this->parameters);
    }

    public function resolveEndpoint(): string
    {
        return "/contacts/$this->id";
    }
}