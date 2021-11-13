<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class IndexSliderController extends Controller
{

    private Slider $model;

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $sliders = Slider::all();

        return response()->json(["data" => $sliders], 200);

    }

}
