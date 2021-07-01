<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lop extends Model
{
    use HasFactory;
    protected $table = "lop";
    public $timestamps = false;

    // lấy chuỗi
    public function lay_hocvien(){
        return $this->hasMany("App\\Models\\hoctailop","id_LOP","id");
    }
}
