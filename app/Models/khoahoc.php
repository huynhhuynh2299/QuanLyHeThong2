<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class khoahoc extends Model
{
    use HasFactory;
    protected $table = "khoahoc";
    public $timestamps = false;


    // lấy chuỗi
    public function lay_lop(){
        return $this->hasMany("App\\Models\\lop","id_KHOAHOC","id");
    }
}
