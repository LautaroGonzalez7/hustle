<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;

class AddImagesProductController extends Controller
{

    public function __invoke(Request $request, $id): JsonResponse
    {

        $product = Product::where('id', $id)->get()->first();

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
//            $path = $file->storeAs('/public/products', $hashedName);
            $destination = 'images/products/';
            $file->move($destination, $hashedName);
            $imageNames[] = $hashedName;
        };

        $product->setImages($imageNames);

        $product->save();

        return response()->json(["data" => $product], 200);

    }

}
