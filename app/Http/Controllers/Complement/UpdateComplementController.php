<?php

namespace App\Http\Controllers\Complement;

use App\Http\Controllers\Controller;
use App\Models\Complement;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class UpdateComplementController extends Controller
{

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $complement = Complement::where('id', '=', $id)->get()->first();

        $payload = $request->getParsedBody();

        $complement->setName(Arr::get($payload, "name"));
        $complement->setPrice(Arr::get($payload, "price"));
        $complement->setContent(Arr::get($payload, "content"));
        $complement->setCategoryId(Arr::get($payload, "category_id"));

        $complement->save();

        return response()->json(["data" => $complement], 200);

    }

}
