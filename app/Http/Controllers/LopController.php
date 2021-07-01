<?php

namespace App\Http\Controllers;

use App\Models\lop;
use Illuminate\Http\Request;

class LopController extends Controller
{
    public function getAllByNNDT($id_nganhnghedaotao)
    {
        $lop_all = lop::where('id_NGANHNGHEDAOTAO', $id_nganhnghedaotao)->get();

        return $lop_all;
    }
}
