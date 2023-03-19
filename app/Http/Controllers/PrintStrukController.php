<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrintStrukController extends Controller
{
    public function index()
    {
        return view('kasir/container/printStruk');
    }
}
