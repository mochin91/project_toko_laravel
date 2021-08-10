<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\True_;

class HomeController extends Controller
{
    //
    public function index()
    {
        //
        return view('home', [
            "title" => "/",
            "products" => Product::where('status',true)->get()
        ]);
    }

}
