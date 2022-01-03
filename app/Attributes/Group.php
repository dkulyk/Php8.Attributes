<?php

namespace App\Attributes;

use Illuminate\Routing\Router;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::IS_REPEATABLE)]
class Group
{
    public function __construct(private array $options = [])
    {
    }

    public function __invoke(\ReflectionClass $class, Router $router, \Closure $routes)
    {
        $router->group($this->options, $routes);
    }
}
