<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class CreateSliderController extends Controller
{

    public function __invoke(ServerRequestInterface $request): JsonResponse
    {

        $payload = $request->getParsedBody();

        $slider = Slider::create(
            Arr::get($payload, "title"),
            Arr::get($payload, "subtitle"),
            Arr::get($payload, "link"),
            Arr::get($payload, "active"),
        );

        $slider->save();

        return response()->json(["data" => $slider], 200);

    }

}
