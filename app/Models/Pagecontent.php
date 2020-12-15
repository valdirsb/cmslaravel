<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Pagecontent extends Model
{
    use HasFactory;

    public $timestamps = false ;

    public function page()
    {
        return $this->belongsTo('App\Models\Page');
    }


    protected $guarded = [];

}
