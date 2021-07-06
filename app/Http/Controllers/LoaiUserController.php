<?php

namespace App\Http\Controllers;

use App\Models\loaiuser;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class LoaiUserController extends Controller
{

    public function getDanhSach()
    {
        $loaiuser_all = loaiuser::all()->where('LU_TEN', '<>', 'Admin');
        $stt = 1;

        return view(
            'Admin.QuanLyLoaiUser.DanhSach',
            [
                'loaiuser_all' => $loaiuser_all,
                'stt' => $stt,
            ]
        );
    }

    public function getByID($id)
    {
        $loaiuser = loaiuser::find($id);

        return $loaiuser;
    }

    // CRUD

    public function edit(Request $request)
    {
        $request->validate([
            'LU_TEN' => 'required',
        ], [
            'required' => ':attribute không được để trống',
        ], [
            'LU_TEN' => 'Tên loại người dùng',
        ]);

        $data = $request->all();

        loaiuser::find($request->id_LOAIUSER)->update($data);

        return Redirect::to('danhsachloaiuser');
    }

    public function getThem()
    {

        return view(
            'Admin.QuanLyLoaiUser.Them'
        );
    }

    public function add(Request $request)
    {
        $request->validate([
            'LU_TEN' => 'required',
        ], [
            'required' => ':attribute không được để trống',
        ], [
            'LU_TEN' => 'Tên người dùng',
        ]);

        $data = $request->all();
        loaiuser::create($data);

        return Redirect::to('danhsachloaiuser');
    }

    public function xoa($id) {
        loaiuser::find($id)->delete();
        return Redirect::to('danhsachloaiuser');
    }
}
