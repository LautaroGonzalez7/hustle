<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::orderBy('order', 'ASC')->where('highlight', true)->limit(6)->get();

        return view('home', ["sliders" => $sliders, "products" => $products]);
    }
}
