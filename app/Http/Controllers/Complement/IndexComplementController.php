<?php

namespace App\Http\Controllers\Complement;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class IndexComplementController extends Controller
{

    private Complement $model;

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $complements = Complement::with('category')->get()->all();

        return response()->json(["data" => $complements], 200);

    }

}
