<?php

namespace App\Http\Controllers;

use App\product;
use http\Env\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     public function totalweb()
    {
        $user = auth::user();
        if ($user !== null) {
            if ($user->cart !== null) {
                $cart_items = $user->cart->cart_items;
                if (!$cart_items) {
                    return $total = 0;
                } else {
                    $total = 0;
                    foreach ($cart_items as $item) {
                        $total = $total + ($item->quantity * $item->price);
                    }
                    return $total;
                }
            }
            return $total = 0;

        }
        // dd($user);

    }

    public function shippingAddress()
    {
        $address = auth::user()->temporaryAddress;
        if ($address == !null) {
            return [
                "verify" => array("delivery"),
                'name' => $address->firstname . $address->lastname,
                'company' => $address->company,
                'street1' => $address->address,
                'city' =>$address->address,
                'state' => $address->state,
                'zip' => $address->zip,
                'country' => $address->country,
                'phone' => $address->phone,
                // 'email' => $address->email,
            ];
        } else {
            return redirect('/shipping_details');
        }

    }
//

public function fromAddress($shop){

    $fromAddress = [
        // 'object_purpose' => 'PURCHASE',
        'name' => 'Eric Barnes',
        'company' => $shop->company,
        'street1' => '814 Mission St.',
        'city' => 'San Francisco',
        'state' => 'CA',
        'zip' => "90277",
        // 'country' => 'US',
        'phone' => '+1 555 341 9393',
        // 'email' => 'shippotle@goshippo.com',
    ];

    return $fromAddress;
}

public function productTest($weight){
         $prod = product::find($weight);
         $getThings = $prod->parcel;

        $productTest = [
            'length' => $getThings->length,
            'width' =>$getThings->width ,
            'height' =>$getThings->height ,
            'distance_unit' => 'in',
            'weight' => $getThings->weight,
            'mass_unit' => 'lb',
        ];
        return $productTest;

    }
}
