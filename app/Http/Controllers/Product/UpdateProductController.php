<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class UpdateProductController extends Controller
{

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $product = Product::where('id', '=', $id)->get()->first();

        $payload = $request->getParsedBody();

        $product->setName(Arr::get($payload, "name"));
        $product->setPrice(Arr::get($payload, "price"));
        $product->setOldPrice(Arr::get($payload, "old_price"));
        $product->setContent(Arr::get($payload, "content"));
        $product->setHighlight(Arr::get($payload, "highlight"));
        $product->setCategoryId(Arr::get($payload, "category_id"));

        $product->save();

        return response()->json(["data" => $product], 200);

    }

}
