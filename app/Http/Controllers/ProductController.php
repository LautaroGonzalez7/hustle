<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Complement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::paginate(12);

        return view('products', ['products' => $products]);
    }

    public function singleProduct(int $id)
    {
        $product = Product::where('id', '=', $id)->get()->first();

        $complements = Complement::all();

        return view('single-product', ['product' => $product, 'complements' => $complements]);
    }
}
