<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hoctailop extends Model
{
    use HasFactory;
    protected $table = "hoc_tai_lop";
    public $timestamps = false;

       public function thuoc_lop(){
        return $this->belongsTo("App\\Models\\lop","id_LOP","id");
    }
    public function thuoc_hocvien(){
        return $this->belongsTo("App\\Models\\hocvien","id_HOCVIEN","id");
    }
    

}
