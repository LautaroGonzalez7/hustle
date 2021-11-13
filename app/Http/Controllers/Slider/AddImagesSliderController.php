<?php

namespace App\Http\Controllers\Slider;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class AddImagesSliderController extends Controller
{

    public function __invoke(Request $request, $id): JsonResponse
    {

        $slider = Slider::where('id', $id)->get()->first();

        $images = $request->file('images');

        $imageNames = [];

        foreach ($images as $file) {
            $filenameWithExt = $file->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $file->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $hashedName = sha1(md5(random_bytes(16))).'.'.$extension;
            $path = $file->storeAs('/public/sliders', $hashedName);
            $imageNames[] = $hashedName;
        };

        $slider->setImages($imageNames);

        $slider->save();

        return response()->json(["data" => $slider], 200);

    }

}
