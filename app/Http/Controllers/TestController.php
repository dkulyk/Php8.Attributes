<?php

namespace App\Http\Controllers;

use App\Attributes\Get;
use App\Attributes\Group;

#[Group([
    'middleware' => 'web',
])]
#[Group([
    'prefix' => 'test1',
])]
#[Group([
    'prefix' => 'test2',
])]
class TestController extends Controller
{
    use SharedActionTrait;

    #[Get('')]
    public function index(): string
    {
        return 'Welcome to the index!';
    }

    #[Get('{id}', ['where' => ['id' => '\d+']])]
    public function view(string $id): string
    {
        return 'You are on the page where ID is '.$id;
    }
}
