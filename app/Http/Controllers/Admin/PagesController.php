<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $pages = Customer::find(env('APP_CUSTOMER_ID'))->pages;
        //$page = Page::where('slug',$slug)->first();

        return view('admin.pages.index', [
            'pages' => $pages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'name'
        ]);

        $data['slug'] = Str::slug($data['name'],'-');

        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:100'],
            'slug' => ['required', 'string', 'max:100',   
                        Rule::unique('pages')->where(function ($query) {
                            return $query->where('customer_id', env('APP_CUSTOMER_ID'));
                        })]
        ]);

        if($validator->fails()) {
            return redirect()->route('pages.index')
            ->withErrors($validator)
            ->withInput();
        }

        $customer = Customer::find(env('APP_CUSTOMER_ID'));

        $page = $customer->pages()->create([
            'name' => $data['name'],
            'slug'=> $data['slug']
        ]);

        $customer->pages()->save($page);

        return redirect()->route('pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = Customer::find(env('APP_CUSTOMER_ID'))->pages;

        $page = $pages->find($id);

        if($page){
            return view('admin.pages.edit',[
                'page' => $page
            ]);
        }

        return redirect()->route('pages.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //$page = Page::find($page);

        if($page) {
            $data = $request->only([
                'name',
            ]);

            $data['slug'] = Str::slug($data['name'],'-');



            $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:100'],
                'slug' => ['required', 'string', 'max:100',   
                            Rule::unique('pages')->where(function ($query) {
                                return $query->where('customer_id', env('APP_CUSTOMER_ID'));
                            })]
            ]);

            $page->name = $data['name'];
            $page->slug = $data['slug'];

            if(count( $validator->errors() ) > 0) {
                return redirect()->route('pages.edit', [
                    'page' => $page->id
                ])->withErrors($validator);
            }

            $page->save();

        }

        return redirect()->route('pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $page = Page::find($id);
            $pagecontents = $page->pagecontents();
            

            $pagecontents->delete();
            $page->delete();

        return redirect()->route('pages.index');
    }
}
