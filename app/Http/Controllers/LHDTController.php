<?php

namespace App\Http\Controllers;

use App\Models\loaihinhdaotao;
use App\Models\loaiuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class LHDTController extends Controller
{
    public function getDanhSach()
    {
        $LHDT_all = loaihinhdaotao::all()->where('LU_TEN', '<>', 'Admin');
        $stt = 1;

        return view(
            'Admin.QuanLyLoaiHinhDaoTao.DanhSach',
            [
                'LHDT_all' => $LHDT_all,
                'stt' => $stt,
            ]
        );
    }

    public function getByID($id)
    {
        $LHDT = loaihinhdaotao::find($id);

        return $LHDT;
    }

    // CRUD

    public function edit(Request $request)
    {
        $request->validate([
            'LH_TEN' => 'required',
        ], [
            'required' => ':attribute không được để trống',
        ], [
            'LH_TEN' => 'Tên loại hình đào tạo',
        ]);

        $data = $request->all();

        loaihinhdaotao::find($request->id_LHDT)->update($data);

        return Redirect::to('danhsachLHDT');
    }

    public function add(Request $request)
    {
        $request->validate([
            'LH_TEN' => 'required',
        ], [
            'required' => ':attribute không được để trống',
        ], [
            'LH_TEN' => 'Tên loại hình đào tạo',
        ]);

        $data = $request->all();
        loaihinhdaotao::create($data);

        return Redirect::to('danhsachLHDT');
    }
}
