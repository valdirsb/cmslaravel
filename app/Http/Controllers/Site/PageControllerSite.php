<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Pagecontent;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class PageControllerSite extends Controller
{
    public function index($slug){

        $page = Page::where('slug',$slug)->first();

        if($page) {
            $customer = $page->customer;
            $contents = $page->pagecontents;

            return view('site.site', [
                    'slug'=> $slug,
                    'page'=> $page,
                    'customer'=>$customer,
                    'contents'=>$contents,
            ]);
        } else {
            echo "erro 404";
        }
    }

}
