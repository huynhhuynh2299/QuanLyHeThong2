<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class doituong extends Model
{
    use HasFactory;
    protected $table = "doituong";
    public $timestamps = false;

    // lấy nhiều
    public function lay_hocvien(){
        return $this->hasMany("App\\Models\\hocvien","id_DOITUONG","id");
    }
}
