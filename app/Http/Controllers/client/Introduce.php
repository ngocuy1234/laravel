<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class Introduce extends Controller
{
    public function index()
    {
        $productAll = Product::orderBy('id', 'desc')->skip(0)->take(12)->get();
        return view('client.introduce', [
            'productAll' => $productAll,
        ]);
    }
}
