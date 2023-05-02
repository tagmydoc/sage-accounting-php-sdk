<?php

namespace TagMyDoc\SageAccounting\Requests;

use Saloon\Http\Request;

abstract class SageRequest extends Request
{
    const PER_PAGE = 25;

    protected ?string $attributes = null;

    protected ?string $nestedAttributes = null;

    protected ?string $from = null;

    protected ?string $to = null;

    protected ?string $since = null;

    protected ?string $sortField = null;

    protected string $sortOrder = 'asc';

    protected int $page = 1;

    protected int $limit = self::PER_PAGE;

    protected function __construct(protected array $parameters = [])
    {
    }

    public static function make(...$parameters): static
    {
        return new static(...$parameters);
    }

    public function withAttributes(string|array $attributes): static
    {
        if (is_array($attributes)) {
            $attributes = implode(',', $attributes);
        }

        $this->attributes = $attributes;

        return $this;
    }

    public function withNestedAllAttributes(): static
    {
        $this->nestedAttributes = 'all';

        return $this;
    }

    public function withAllAttributes(): static
    {
        $this->attributes = 'all';

        return $this;
    }

    public function withSinceDate(string $since): static
    {
        $this->since = $since;

        return $this;
    }

    public function withDateRange(string $from, string $to): static
    {
        $this->from = $from;
        $this->to = $to;

        return $this;
    }

    public function withSort(string $field, $order = 'asc'): static
    {
        $this->sortField = $field;
        $this->sortOrder = $order;

        return $this;
    }

    public function withPagination(int $page, int $limit = self::PER_PAGE): static
    {
        $this->page = $page;
        $this->limit = $limit;

        return $this;
    }

    protected function defaultQuery(): array
    {
        $params = [...$this->parameters];

        if ($this->attributes) {
            $params['attributes'] = $this->attributes;
        }

        if ($this->nestedAttributes) {
            $params['nested_attributes'] = $this->nestedAttributes;
        }

        if ($this->since) {
            $params['updated_or_created_since'] = $this->since;
        }

        if ($this->from) {
            $params['from_date'] = $this->from;
        }

        if ($this->to) {
            $params['to_date'] = $this->to;
        }

        if ($this->sortField) {
            $params['sort'] = "$this->sortField:$this->sortOrder";
        }

        if ($this->page) {
            $params['page'] = $this->page;
        }

        if ($this->limit) {
            $params['items_per_page'] = $this->limit;
        }

        return $params;
    }
}