<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RelationsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return "Welcome to our Relationpage";
    }
}