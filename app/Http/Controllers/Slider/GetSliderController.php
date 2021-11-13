<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class GetSliderController extends Controller
{

    private Slider $model;

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $slider = Slider::where('id', '=', $id)->get()->first();

        return response()->json(["data" => $slider], 200);

    }

}
