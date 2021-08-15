<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class IndexCategoryController extends Controller
{

    private Category $model;

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $categories = Category::all();

        return response()->json(["data" => $categories], 200);

    }

}
