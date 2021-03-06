<?php

namespace App\Http\Controllers;

use App\Attributes\Get;
use App\Attributes\Group;
use App\Attributes\Method;
use App\Attributes\Permission;

#[Group(['middleware' => 'web', 'where' => ['id' => '\d+']])]
class TestController extends Controller
{
    use SharedActionTrait;

    #[Get('')]
    public function index(): string
    {
        return 'Welcome to the index!';
    }

    #[Get('{id}')]
    public function view(string $id): string
    {
        return 'You are on the page where ID is '.$id;
    }

    #[Permission('admin')]
    #[Method('DELETE','{id}')]
    public function destroy(){

    }
}
