<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        
        $settings = [];

        $dbsettings = Setting::get();
        
        foreach ($dbsettings as $dbsetting) {
            $settings[ $dbsetting[ 'name' ] ] =  $dbsetting[ 'content' ] ;
        }


        return view('admin.settings.index', [
            'settings' => $settings
        ]);

    }


    public function save(Request $request){

        $data = $request->only([
            'title', 'subtitle', 'email', 'fone', 'bgcolor', 'textcolor'
        ]);
        $validator = $this->validator($data);


        if($request->file) {
            $request->validate([
                'file' => 'required|image|mimes:jpeg,jpg,png'
            ]);

            $imagelogo = Setting::find(7);
    
            $ext = $request->file->extension();
            $imageName = 'logo.'.$ext;
            $imageFolder = '/media/images';
            //copiando a nova imagem
            $request->file->move(public_path($imageFolder), $imageName);
            //deletando a imagem atual
            $urlImage = $imageFolder.'/'.$imageName;

            Setting::find(7)->update([
                'content' => $urlImage
            ]);

        }


        if($validator->fails()) {
            return redirect()->route('settings')
            ->withErrors($validator);
        }

        foreach ($data as $item => $value) {

            
                Setting::where('name', $item)->update([
                    'content' => $value
                ]);
            
        }
        
        return redirect()->route('settings')
            ->with('warning', 'informações alteradas com sucesso!');
    }

    protected function validator($data) {
        return Validator::make($data, [
            'title' => ['string', 'max:100'],
            'subtitle' => ['string', 'max:100'],
            'email' => ['string', 'email'],
            'fone' => ['string', 'max:100'],
            'bgcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i'],
            'textcolor' => ['string', 'regex:/#[A-Z0-9]{6}/i' ],
        ]);
    }

}
