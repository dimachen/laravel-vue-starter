<?php

namespace App\Http\Controllers;
use App\Http\Requests\TestRequest;

class BaseController extends Controller
{
    function test(TestRequest $request)
    {
        return view('test');
    }
}
