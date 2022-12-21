<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class CreateProductController extends Controller
{

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $payload = $request->getParsedBody();

        $product = Product::create(
            Arr::get($payload, "name"),
            Arr::get($payload, "price"),
            Arr::get($payload, "old_price"),
            Arr::get($payload, "content"),
            Arr::get($payload, "highlight"),
            Arr::get($payload, "category_id"),
        );

        $product->save();

        return response()->json(["data" => $product], 200);

    }

}
