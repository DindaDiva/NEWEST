<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UnauthorizedController;
use App\Http\Middleware\CheckRole;
use App\Models\Product;


class CustController extends Controller
{
    function index() {
        $products = Product::all();
        return view('cust.home', compact('products'));
    }
}
