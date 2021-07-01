<?php

namespace App\Http\Controllers;

use App\Models\huyen;
use App\Models\tinh;
use App\Models\xa;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function load(Request $request)
    {       
         // Xã
        if ($request->id_HUYEN) {
            $id_HUYEN = $request->id_HUYEN;
            $xa = huyen::find($id_HUYEN)->lay_xa;

            return $xa;
        }

        // Huyện
        if ($request->id_TINH) {
            $id_TINH = $request->id_TINH;
            $huyen = tinh::find($id_TINH)->lay_huyen;

            return $huyen;
        }
    }
}
