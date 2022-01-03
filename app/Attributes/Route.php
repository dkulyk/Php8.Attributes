<?php

declare(strict_types=1);

namespace App\Attributes;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Route
{
    public function __construct(private array|string $methods, private string $uri, private array $options = [])
    {
    }
}
