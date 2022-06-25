<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class IndexProductController extends Controller
{

    private Product $model;

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $products = Product::orderBy('order', 'ASC')->with('category')->get()->all();

        return response()->json(["data" => $products], 200);

    }

}
