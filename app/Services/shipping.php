<?php
namespace App\Services;

use App\User;
use Shippo;
use Auth;

class Shipping
{
    public function __construct()
    {
        // Grab this private key from
        // .env and setup the Shippo api
        \Shippo::setApiKey(env('SHIPPO_PRIVATE'));  
    }

        public function shippingAddress()
    {
        $address = auth::user()->temporaryAddress;
        return [
            'name' => $address->firstname . $address->lastname,
            'company' => $address->company,
            'street1' => $address->address,
            'city' => $address->city,
            'state' => $address->state,
            'zip' => $address->zip,
            'country' => $address->country,
            'phone' => $address->phone,
            'email' => $address->email,
        ];
    }

    public function newCheckout($id)
    {
        $temporaryAddress = auth::user()->temporaryAddress;
        if ($temporaryAddress == !null) {
            // return $this->shippingAddress();
            return \Shippo_Address::create($this->shippingAddress());

        }
        return redirect('/shipping_details')->with('error', 'you have no shipping address');
        //validate address
        //make single cart item check out;
        //return with deducted cart

    }

    // public function validateAddress()
    // {
    //     // Grab the shipping address from the User model
    //     $toAddress = $this->shippingAddress();
    //     // Pass a validate flag to Shippo
    //     $toAddress['validate'] = true;
    //     // Verify the address data
    //     return Shippo_Address::create($toAddress);
    // }

  
}
