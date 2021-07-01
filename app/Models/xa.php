<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class xa extends Model
{
    use HasFactory;
    protected $table = "xa";
    public $timestamps = false;

    public function lay_huyen(){
        return $this->belongsTo("App\\Models\\huyen","id_HUYEN","id");
    }


    // lấy chuỗi 
    public function lay_dc_hv(){
        return $this->hasMany("App\\Models\\cutruhv", "id_XA","id");
    }

    public function lay_dc_gv(){
        return $this->hasMany("App\\Models\\cutrugv", "id_XA","id");
    }

    public function lay_csdt(){
        return $this->hasMany("App\\Models\\cosodaotao", "id_XA","id");
    }
}
