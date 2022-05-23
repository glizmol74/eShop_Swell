<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StaticController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function download($id)
    {
        return $id;
    }    
}


