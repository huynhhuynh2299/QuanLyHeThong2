<?php

namespace App\Http\Controllers;

use App\Models\QuanLyTKB;
use Illuminate\Http\Request;

class TKBController extends Controller
{
    public function insert(Request $request)
    {
        $new_row = new QuanLyTKB();
        $new_row->L_MASO = $request->L_MASO;
        $new_row->MH_MASO = $request->MH_MASO;
        $new_row->TKB_THU = $request->TKB_THU;
        $new_row->TKB_BUOI = $request->TKB_BUOI;
        $new_row->TKB_TGBD = $request->TKB_TGBD;
        $new_row->TKB_TGKT = $request->TKB_TGKT;

        $new_row->save();
    }

    // public function update(Request $request)
    // {
    //     $edit_row = QuanLyTKB::find($request->CS_MASO);
    //     $edit_row->CS_TEN =  $request->CS_TEN;
    //     $edit_row->TEN_TINH =  $request->TEN_TINH;
    //     $edit_row->TEN_HUYEN =  $request->TEN_HUYEN;
    //     $edit_row->TEN_XA =  $request->TEN_XA;
    //     $edit_row->CS_SO_DUONG =  $request->CS_SO_DUONG;
    //     $edit_row->save();
    // }

    // public function delete($CS_MASO)
    // {
    //     $del_row = QuanLyTKB::find($CS_MASO);
    //     $del_row->delete();
    // }

    // public function getAll()
    // {
    //     return QuanLyTKB::all();
    // }

    // public function get(int $value)
    // { // Truy vấn theo maso- bất kỳ
    //     return QuanLyTKB::all()->where("CS_MASO", $value);
    // }
}
