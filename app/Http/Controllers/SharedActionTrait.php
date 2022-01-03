<?php

namespace App\Http\Controllers;

use App\Attributes\Get;

trait SharedActionTrait
{
    #[Get('shared')]
    public function sharedAction(): string
    {
        return 'This is shared action for '.static::class;
    }
}
