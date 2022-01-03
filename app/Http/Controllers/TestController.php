<?php

namespace App\Http\Controllers;

class TestController extends Controller
{
    public function index(): string
    {
        return 'Welcome to the index!';
    }

    public function view(string $id): string
    {
        return 'You are on the page where id is '.$id;
    }
}
