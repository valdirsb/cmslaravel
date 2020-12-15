<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pagecontent;
use App\Models\Customer;
use App\Models\Page;

class StaticPagesController extends Controller
{
    public function index(){
        return view('site.home');
    }

    public function quemsomos(){

        //$contents = Pagecontent::where('page_id', 1)->get();
        //return view('site.quemsomos',['contents'=>$contents]);

        $page = Page::find(2);

        $contents = $page->pagecontents;

        return view('site.quemsomos',['contents'=>$contents]);
    }

    public function areas(){

        $contents = Pagecontent::where('page_id', 3)->get();
        return view('site.areas',['contents'=>$contents]);
    }
}
