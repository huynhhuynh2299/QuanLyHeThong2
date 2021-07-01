<?php

namespace App\Http\Controllers;

use App\Models\QuanLyCSDT;

use Illuminate\Http\Request;

class CSDTController extends Controller
{
    public function insert(Request $request)
    {
        $new_row = new QuanLyCSDT();
        $new_row->CS_MASO = $request->CS_MASO;
        $new_row->TEN_TINH = $request->TEN_TINH;
        $new_row->TEN_HUYEN = $request->TEN_HUYEN;
        $new_row->TEN_XA = $request->TEN_XA;
        $new_row->CS_TEN = $request->CS_TEN;
        $new_row->CS_SO_DUONG = $request->CS_SO_DUONG;

        $new_row->save();
    }

    public function update(Request $request)
    {
        $edit_row = QuanLyCSDT::find($request->CS_MASO);
        $edit_row->CS_TEN =  $request->CS_TEN;
        $edit_row->TEN_TINH =  $request->TEN_TINH;
        $edit_row->TEN_HUYEN =  $request->TEN_HUYEN;
        $edit_row->TEN_XA =  $request->TEN_XA;
        $edit_row->CS_SO_DUONG =  $request->CS_SO_DUONG;
        $edit_row->save();
    }

    public function delete($CS_MASO)
    {
        $del_row = QuanLyCSDT::find($CS_MASO);
        $del_row->delete();
    }

    public function getAll()
    {
        return QuanLyCSDT::all();
    }

    public function get(int $value)
    { // Truy vấn theo maso- bất kỳ
        return QuanLyCSDT::all()->where("CS_MASO", $value);
    }
}
