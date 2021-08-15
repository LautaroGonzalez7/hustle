<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class CreateCategoryController extends Controller
{

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $payload = $request->getParsedBody();

        $category = Category::create(
            Arr::get($payload, "name"),
            Arr::get($payload, "scope")
        );

        $category->save();

        return response()->json(["data" => $category], 200);

    }

}
