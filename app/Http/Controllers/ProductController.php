<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Complement;
use Illuminate\Http\Request;
use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

class ProductController extends Controller
{
    public function products(Request $request)
    {
        $filterSearch = $request->filterSearch;

        if($filterSearch){
            $products = Product::where('name', '=', $filterSearch)->orderBy('position', 'ASC')->paginate(12);
        }

        if(isEmpty($filterSearch)){
            $products = Product::orderBy('position', 'ASC')->paginate(12);
        }

        return view('products', ['products' => $products]);
    }

    public function singleProduct(int $id)
    {
        $product = Product::where('id', '=', $id)->get()->first();

        $complements = Complement::all();

        $complementCategories = Category::with('complement')->get();

        return view('single-product', [
            'product' => $product,
            'complements' => $complements,
            'complementCategories' => $complementCategories
        ]);
    }
}
