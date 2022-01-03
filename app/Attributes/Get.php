<?php

declare(strict_types=1);

namespace App\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Get extends Route
{
    public function __construct(string $uri, array $options = [])
    {
        parent::__construct('GET', $uri, $options);
    }
}
