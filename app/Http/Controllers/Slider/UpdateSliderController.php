<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Psr\Http\Message\ServerRequestInterface;

class UpdateSliderController extends Controller
{

    public function __invoke(ServerRequestInterface $request, int $id): JsonResponse
    {

        $slider = Slider::where('id', '=', $id)->get()->first();

        $payload = $request->getParsedBody();

        $slider->setTitle(Arr::get($payload, "title"));
        $slider->setSubtitle(Arr::get($payload, "subtitle"));
        $slider->setLink(Arr::get($payload, "link"));
        $slider->setActive(Arr::get($payload, "active"));

        $slider->save();

        return response()->json(["data" => $slider], 200);

    }

}
