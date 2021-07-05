<?php

namespace App\Http\Controllers;

use App\Models\loaiuser;
use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        return view('Admin.layout.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'USER_MASO' => 'required',
            'USER_PASS' => 'required',
        ], [
            'required' => ':attribute không được để trống',
        ], [
            'USER_MASO' => 'Tên đăng nhập',
            'USER_PASS' => 'Mật khẩu',
        ]);

        $USER_MASO = $request->USER_MASO;

        $result = user::where('USER_MASO', $USER_MASO)->first();

        if (Hash::check($request->USER_PASS, $result->USER_PASS)) {
            if ($result->id_LOAIUSER == 1) {
                Session()->put('admin_login', true);
                Session()->put('id_admin', $request->id);
                Session()->put('USER_TEN', $request->USER_TEN);
                return Redirect::to('/danhsachuser');
            } else {
                Session()->put('user_login', true);
                Session()->put('id_user', $request->id);
                Session()->put('USER_TEN', $request->USER_TEN);
                return Redirect::to('/danhsachhocvien');
            }
            echo "<script> alert('Đăng nhập thành công')</script>";
        } else {
            echo "<script> alert('Sai tên đăng nhập hoặc mật khẩu')</script>";
        }
    }

    public function logout()
    {
        Session()->put('id_admin', NULL);
        return Redirect::to('/login');
    }

    public function getDanhSach(Request $request)
    {
        $user_all = user::all()->where('id_LOAIUSER', '<>', '1');
        $loaiuser_all = loaiuser::all()->where('id', '<>', '1');
        $stt = 1;

        // Filter
        if (isset($request->id_LOAIUSER) && $request->id_LOAIUSER != 0) {
            $user_all = user::all()->where('id_LOAIUSER', $request->id_LOAIUSER)->where('id_LOAIUSER', '<>', '1');
        }
        return view(
            'Admin.QuanLyUser.DanhSach',
            [
                'user_all' => $user_all,
                'loaiuser_all' => $loaiuser_all,
                'stt' => $stt,
            ]
        );
    }

    public function getByID($id)
    {
        $user = user::find($id);

        return $user;
    }

    // CRUD

    public function edit(Request $request)
    {
        $request->validate([
            'USER_TEN' => 'required',
        ], [
            'required' => ':attribute không được để trống',
        ], [
            'USER_TEN' => 'Tên người dùng',
        ]);

        if (empty($request->USER_PASS)) {
            // Không đổi mật khẩu
            $data['USER_TEN'] = $request->USER_TEN;
            $data['id_LOAIUSER'] = $request->id_LOAIUSER;
        } else {
            // Đổi mật khẩu
            $check_password = user::find($request->id_USER)->where('USER_PASS', $request->USER_PASS)->count();

            if ($request->USER_PASS_NEW == $request->USER_PASS_COMFIRM && $check_password != 0) {
                $data['USER_TEN'] = $request->USER_TEN;
                $data['id_LOAIUSER'] = $request->id_LOAIUSER;
                $data['USER_PASS'] = Hash::make($request->USER_PASS);
            }
        }

        user::find($request->id_USER)->update($data);



        return Redirect::to('danhsachuser');
    }

    public function getThem()
    {
        $loaiuser_all = loaiuser::all()->where('id', '<>', '1');
        $stt = 1;

        return view(
            'Admin.QuanLyUser.Them',
            [
                'loaiuser_all' => $loaiuser_all,
                'stt' => $stt,
            ]
        );
    }

    public function add(Request $request)
    {
        $request->validate([
            'USER_TEN' => 'required',
            'USER_MASO' => 'required|unique:user,USER_MASO',
            'id_LOAIUSER' => 'required',
            'USER_PASS' => 'required',
            'USER_PASS_COMFIRM' => 'required',
        ], [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại ',
        ], [
            'USER_TEN' => 'Tên người dùng',
            'USER_MASO' => 'Tên đăng nhập',
            'id_LOAIUSER' => 'Loại người dùng',
            'USER_PASS' => 'Mật khẩu',
            'USER_PASS_COMFIRM' => 'Xác nhận mật khẩu',
        ]);

        $data = $request->all();
        $data['USER_PASS'] = Hash::make($request->USER_PASS);
        user::create($data);

        return Redirect::to('danhsachuser');
    }

    public function xoa($id)
    {
        user::find($id)->delete();
        return Redirect::to('danhsachuser');
    }

    public function filterDanhSach(Request $request)
    {
        $user_all = user::all()->where('id_LOAIUSER', $request->id_LOAIUSER);
        $loaiuser_all = loaiuser::all()->where('id', '<>', '1');
        $stt = 1;

        return $user_all;
    }
}
