<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tinh extends Model
{
    use HasFactory;
    protected $table = "tinh";
    public $timestamps = false;


    // lấy chuỗi 
    public function lay_huyen()
    {
        return $this->hasMany("App\\Models\\huyen", "id_TINH", "id");
    }
    public function lay_xa(){
        return $this->hasManyThrough(
            'App\\Models\\xa',
            'App\\Models\\huyen',
            'id_TINH','id_HUYEN',
            'id','id'
        );
    }
}
