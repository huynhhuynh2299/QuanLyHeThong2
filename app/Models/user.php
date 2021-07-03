<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $table = "user";
    protected $fillable = ['USER_MASO', 'USER_TEN', 'USER_PASS','id_LOAIUSER'];
    public $timestamps = false;

    // lấy một
    public function thuoc_loaiuser()
    {
        return $this->belongsTo("App\\Models\\loaiuser", "id_LOAIUSER", "id");
    }

    
}
