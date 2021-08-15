<?php

namespace App\Http\Controllers\Steps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StepController extends Controller
{

    public function stepOne(Request $request)
    {
        $message = $request->session()->get('buy.message');

        return view('steps.step-one', ["message" => $message]);
    }

    public function stepTwo(Request $request)
    {
        $shipment = $request->session()->get('buy.shipment');

        return view('steps.step-two', ["shipment" => $shipment]);
    }

    public function stepThree()
    {
        return view('steps.step-three');
    }

}
