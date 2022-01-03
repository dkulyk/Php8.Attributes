<?php

namespace App\Attributes;

use App\Models\User;

#[\Attribute(\Attribute::TARGET_CLASS | \Attribute::TARGET_METHOD)]
class Permission extends Group
{
    public function __construct(string $permission)
    {
        parent::__construct(['middleware' => 'permission:'.$permission]);
    }
}
