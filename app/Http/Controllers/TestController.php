<?php

namespace App\Http\Controllers;

use App\Attributes\Get;

class TestController extends Controller
{
    #[Get('')]
    public function index(): string
    {
        return 'Welcome to the index!';
    }

    #[Get('{id}')]
    public function view(string $id): string
    {
        return 'You are on the page where id is '.$id;
    }
}
