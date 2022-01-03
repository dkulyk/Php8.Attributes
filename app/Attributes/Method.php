<?php

declare(strict_types=1);

namespace App\Attributes;

use Illuminate\Routing\Route;
use Illuminate\Routing\Router;

#[\Attribute(\Attribute::TARGET_METHOD)]
class Method
{
    public function __construct(private array|string $methods, private string $uri, private array $options = [])
    {
    }

    public function __invoke(\ReflectionMethod $method, Router $router): \Illuminate\Routing\Route
    {
        $router->group($this->options, function (Router $router) use ($method, &$route) {
            $route = $router->match($this->methods, $this->uri, [$method->class, $method->name]);
        });

        return $route;
    }
}
