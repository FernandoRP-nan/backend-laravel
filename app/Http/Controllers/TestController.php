<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TestController extends Controller
{
    public function __invoke()
    {
        $user = User::find(1);
        return $user->todos;
    }
}
