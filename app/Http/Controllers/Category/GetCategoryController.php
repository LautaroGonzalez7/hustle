<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class GetCategoryController extends Controller
{

    private Category $model;

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $category = Category::where('id', '=', $id)->get()->first();

        return response()->json(["data" => $category], 200);

    }

}
