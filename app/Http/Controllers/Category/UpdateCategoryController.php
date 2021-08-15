<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class UpdateCategoryController extends Controller
{

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $category = Category::where('id', '=', $id)->get()->first();

        $payload = $request->getParsedBody();

        $category->setName(Arr::get($payload, "name"));
        $category->setScope(Arr::get($payload, "scope"));

        $category->save();

        return response()->json(["data" => $category], 200);

    }

}
