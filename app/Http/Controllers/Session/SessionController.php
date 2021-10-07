<?php

namespace App\Http\Controllers\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use \Illuminate\Http\RedirectResponse;

class SessionController extends Controller
{

    public function addProduct(Request $request): RedirectResponse
    {
        $request->session()->put('buy.productId', $request->input('productId'));

        $complements = [];
        if (!empty($request->input('complements'))) {
            $complements = explode(",", $request->input('complements'));
        }
        $request->session()->put('buy.complements', $complements);

        $request->session()->put('buy.shipment.date', $request->input('shipmentDate'));
        $request->session()->put('buy.shipment.hour', $request->input('shipmentHour'));

        return redirect()->route('stepOne.get');
    }

    public function addMessage(Request $request): RedirectResponse
    {
        $request->session()->put('buy.message', $request->input('message'));

        return redirect()->route('stepTwo.get');
    }

    public function addShipmentInformation(Request $request): RedirectResponse
    {
        $request->session()->put('buy.shipment.name', $request->input('name'));
        $request->session()->put('buy.shipment.district', $request->input('district'));
        $request->session()->put('buy.shipment.address', $request->input('address'));
        $request->session()->put('buy.shipment.phone', $request->input('phone'));

        return redirect()->route('stepThree.get');
    }

}
