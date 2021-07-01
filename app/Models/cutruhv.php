<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cutruhv extends Model
{
    use HasFactory;
    protected $table = "cutruhv";
    public $timestamps = false;

    public function getAll()
    {
        return cutruhv::all();
    }

    // lấy một
    public function thuoc_xa()
    {
        return $this->belongsTo("App\\Models\\xa", "id_XA", "id");
    }
}
