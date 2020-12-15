<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use App\Models\Pagecontent;
use App\Models\Page;
use Illuminate\Support\Facades\File;

class PagecontentsController extends Controller
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
    
    public function index($pageid)
    {
        $customer = Customer::find(env('APP_CUSTOMER_ID'));
        $page = $customer->pages->find($pageid);
        if($page){
            $contents = $page->pagecontents;
            return view('admin.pagecontents.index', [
                'page'=>$page,
                'customer_name' => $customer->name,
                'contents' => $contents
            ]);
        }
        return view('admin.pagecontents.index');
        
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pageid)
    {
        $customer = Customer::find(env('APP_CUSTOMER_ID'));
        $page = $customer->pages->find($pageid);
        return view('admin.pagecontents.add', [
            'page'=> $page
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($pageid, Request $request)
    {
        
        $data = $request->only([
            'title',
            'subtitle',
            'icon',
            'content'
        ]);

        if($request->file) {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,jpg,png'
            ]);
    
            $ext = $request->file->extension();
            $imageName = time().'.'.$ext;
            $imageFolder = '/media/images';
    
            $request->file->move(public_path($imageFolder), $imageName);

            $urlImage = $imageFolder.'/'.$imageName;
        } else {
            $urlImage = NULL;
        }

        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:100'],
            'subtitle' => ['nullable','string', 'max:100'],
            'icon' => ['nullable','string', 'max:100'],
            'content' => ['required','string', 'max:100']
        ]);

        if($validator->fails()) {
            return redirect()->route('pagecontent.create',['pageid'=>$pageid])
            ->withErrors($validator)
            ->withInput();
        }

        //$customer = Customer::find(env('APP_CUSTOMER_ID'));
        /*$page = $customer->pages()->create([
            'name' => $data['name'],
            'slug'=> $data['slug']
        ]);
        */
        $page = Page::find($pageid);

        $pagecontent = $page->pagecontents()->create([
            'title'=> $data['title'],
            'subtitle'=> $data['subtitle'],
            'icon'=> $data['icon'],
            'content'=> $data['content'],
            'image' => $urlImage
        ]);

        $page->pagecontents()->save($pagecontent);

        return redirect()->route('pagecontent.index',['pageid'=>$pageid]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($pageid, $id)
    {
        $customer = Customer::find(env('APP_CUSTOMER_ID'));
        $page = $customer->pages->find($pageid);
        //$content = Pagecontent::find($id);
        $content = $page->pagecontents->find($id);
        if($page){
            return view('admin.pagecontents.edit', [
                'page'=>$page,
                'content' => $content
            ]);
        }
        return view('admin.pagecontents.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pageid, $id)
    {
        
        $pagecontent = Pagecontent::find($id);

        if($pagecontent){

            $data = $request->only([
                'title',
                'subtitle',
                'icon',
                'content',
            ]);

            $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:100'],
                'subtitle' => ['nullable','string', 'max:100'],
                'icon' => ['nullable','string', 'max:100'],
                'content' => ['required','string', 'max:100']
            ]);

            if($request->file) {
                $request->validate([
                    'file' => 'required|image|mimes:jpeg,jpg,png'
                ]);
        
                $ext = $request->file->extension();
                $imageName = time().'.'.$ext;
                $imageFolder = '/media/images';
                //copiando a nova imagem
                $request->file->move(public_path($imageFolder), $imageName);
                //deletando a imagem atual
                $urlImage = $imageFolder.'/'.$imageName;
                $abspath=$_SERVER['DOCUMENT_ROOT'];
                $finalpath = $abspath.'/'.$pagecontent->image;
                if (File::exists($finalpath)) {
                    File::delete($finalpath);
                    //unlink($caminho);
                }

                $pagecontent->image = $urlImage;

            }
        

            $pagecontent->title = $data['title'];
            $pagecontent->subtitle = $data['subtitle'];
            $pagecontent->icon = $data['icon'];
            $pagecontent->content = $data['content'];


            if(count( $validator->errors() ) > 0) {
                return redirect()->route('pagecontent.edit', [
                    'content' => $id
                ])->withErrors($validator);
            }

            $pagecontent->save();

        }

        return redirect()->route('pagecontent.index',['pageid'=>$pagecontent->page_id] );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($pageid, $pagecontent)
    {
        $content = Pagecontent::find($pagecontent);

        $abspath=$_SERVER['DOCUMENT_ROOT'];

        $finalpath = $abspath.'/'.$content->image;

        if (File::exists($finalpath)) {
            File::delete($finalpath);
            //unlink($caminho);
        }

        $content->delete();

        return redirect()->route('pagecontent.index',['pageid'=>$pageid]);
    }
}
