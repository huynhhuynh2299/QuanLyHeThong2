<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huyen extends Model
{
    use HasFactory;
    protected $table = "huyen";
    public $timestamps = false;

    public function lay_tinh(){
        return $this->belongsTo("App\\Models\\tinh","id_TINH","id");
    }


    // lấy chuỗi 
    public function lay_xa(){
        return $this->hasMany("App\\Models\\xa","id_HUYEN","id");
    }
    public function lay_cutruhv(){
        return $this->hasManyThrough(
            'App\\Models\\cutruhv',
            'App\\Models\\xa',
            'id_HUYEN',
            'id_XA',
            'id','id'
        );
    }
}
