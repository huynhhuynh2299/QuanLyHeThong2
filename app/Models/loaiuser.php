<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaiuser extends Model
{
    use HasFactory;
    protected $table = "loaiuser";
    public $timestamps = false;
    protected $fillable = ['LU_TEN'];

    public function lay_user(){
        return $this->hasMany("App\\Models\\user","id_LOAIUSER","id");
    }
}
