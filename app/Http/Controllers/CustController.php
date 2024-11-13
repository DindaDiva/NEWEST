<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SesiController;
use App\Http\Controllers\CustController;
use App\Http\Controllers\UnauthorizedController;
use App\Http\Middleware\CheckRole;

class CustController extends Controller
{
    function index() {
        return view('cust.home');
    }
}
