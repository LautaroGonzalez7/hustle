<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Complement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function products()
    {
        $products = Product::orderBy('order', 'ASC')->paginate(12);

        return view('products', ['products' => $products]);
    }

    public function singleProduct(int $id)
    {
        $product = Product::where('id', '=', $id)->get()->first();

        $complements = Complement::all();

        $complementCategories = Category::where('scope', 'complements')->with('complement')->get();

        return view('single-product', [
            'product' => $product,
            'complements' => $complements,
            'complementCategories' => $complementCategories
        ]);
    }
}
