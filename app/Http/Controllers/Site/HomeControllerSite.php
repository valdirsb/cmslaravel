<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Page;

class HomeControllerSite extends Controller
{
    
    public function index(){


        $page = Page::where('slug','home')->first();

        if($page) {
            $customer = $page->customer;
            $contents = $page->pagecontents;

            return view('site.site', [
                    'slug'=> $page->slug,
                    'page'=> $page,
                    'customer'=>$customer,
                    'contents'=>$contents,
            ]);
        } else {
            echo "erro 404";
        }
    }
}
