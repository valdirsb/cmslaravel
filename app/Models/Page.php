<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    public $timestamps = false ;

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function pagecontents()
    {
        return $this->hasMany('App\Models\Pagecontent');
    }

    

    protected $guarded = [];
    
}
