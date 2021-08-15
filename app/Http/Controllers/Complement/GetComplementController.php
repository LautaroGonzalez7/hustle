<?php

namespace App\Http\Controllers\Complement;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class GetComplementController extends Controller
{

    private Complement $model;

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $complement = Complement::with('category')->where('id', '=', $id)->get()->first();

        return response()->json(["data" => $complement], 200);

    }

}
