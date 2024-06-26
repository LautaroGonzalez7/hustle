<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class GetProductController extends Controller
{

    private Product $model;

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $product = Product::with('categories')->where('id', '=', $id)->get()->first();

        return response()->json(["data" => $product], 200);

    }

}
