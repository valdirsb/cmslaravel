<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;

class HomeControllerSite extends Controller
{
    
    public function index(){

        $customer = Customer::find(1);
        
        return view('site.home',[
            'customer' => $customer
        ]);
    }
}
