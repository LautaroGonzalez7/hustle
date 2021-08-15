<?php

namespace App\Http\Controllers\Complement;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class CreateComplementController extends Controller
{

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $payload = $request->getParsedBody();

        $complement = Complement::create(
            Arr::get($payload, "name"),
            Arr::get($payload, "price"),
            Arr::get($payload, "content"),
            Arr::get($payload, "category_id"),
        );

        $complement->save();

        return response()->json(["data" => $complement], 200);

    }

}
