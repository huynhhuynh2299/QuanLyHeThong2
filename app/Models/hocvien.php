<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hocvien extends Model
{
    use HasFactory;
    protected $table = "hocvien";
    public $timestamps = false;

    // lấy một
    public function thuoc_doituong()
    {
        return $this->belongsTo("App\\Models\\doituong", "id_DOITUONG", "id");
    }

    // lấy chuỗi
    public function lay_lop()
    {
        return $this->hasMany("App\\Models\\lop", "id_HOCVIEN", "id");
    }

    public function lay_nguoiquen()
    {
        return $this->hasMany("App\\Models\\nguoiquen", "id_HOCVIEN", "id");
    }

    public function lay_cutruhv()
    {
        return $this->hasMany("App\\Models\\cutruhv", "id_HOCVIEN", "id");
    }

    public function lay_diem()
    {
        return $this->hasMany("App\\Models\\diem", "id_HOCVIEN", "id");
    }

    public function lay_congviec()
    {
        return $this->hasMany("App\\Models\\diem", "id_HOCVIEN", "id");
    }

    public function lay_dscc()
    {
        return $this->hasMany("App\\Models\\danhsachchungchi", "id_HOCVIEN", "id");
    }
    // truy vấn theo giá trị một cột bất kỳ
    public function getByCol(String $col, String $value)
    {
        return hocvien::all()->where($col, $value);
    }

    // truy vấn theo giá trị 2 cột bất kỳ
    public function getBy2Col(
        String $col1,
        String $value1,
        String $col2,
        String $value2
    ) {
        return hocvien::all()
            ->where($col1, $value1)
            ->where($col2, $value2);
    }
    // truy vấn theo n cột bất kỳ dựa theo code mẫu ở trên tự edit theo từng trường hợp

    //CURD
    // insert
    public function insert(
        String $HV_CMND,
        String $HV_HOTEN,
        String $HV_SDT,
        String $HV_NGAYSINH,
        String $HV_GIOITINH,
        String $HV_TTVIECLAM,
        String $HV_DANTOC,
        String $HV_HOCVAN,
        String $HV_CHUANDAURA,
        String $HV_NOILAMVIECDUKIEN,
        int $id_DOITUONG
    ) {
        $NEW_ROW = new hocvien();
        $NEW_ROW->HV_CMND = $HV_CMND;
        $NEW_ROW->HV_HOTEN = $HV_HOTEN;
        $NEW_ROW->HV_SDT = $HV_SDT;
        $NEW_ROW->HV_NGAYSINH = $HV_NGAYSINH;
        $NEW_ROW->HV_GIOITINH = $HV_GIOITINH;
        $NEW_ROW->HV_TTVIECLAM = $HV_TTVIECLAM;
        $NEW_ROW->HV_DANTOC = $HV_DANTOC;
        $NEW_ROW->HV_HOCVAN = $HV_HOCVAN;
        $NEW_ROW->HV_CHUANDAURA = $HV_CHUANDAURA;
        $NEW_ROW->HV_NOILAMVIECDUKIEN = $HV_NOILAMVIECDUKIEN;
        $NEW_ROW->id_DOITUONG = $id_DOITUONG;
        $NEW_ROW->save();
    }
    // thao tác update
    public function edit(
        int $id,
        String $HV_CMND,
        String $HV_HOTEN,
        String $HV_SDT,
        String $HV_NGAYSINH,
        String $HV_GIOITINH,
        String $HV_TTVIECLAM,
        String $HV_DANTOC,
        String $HV_HOCVAN,
        String $HV_CHUANDAURA,
        String $HV_NOILAMVIECDUKIEN,
        int $id_DOITUONG
    ) {
        $NEW_ROW = hocvien::find($id);
        $NEW_ROW->HV_CMND = $HV_CMND;
        $NEW_ROW->HV_HOTEN = $HV_HOTEN;
        $NEW_ROW->HV_SDT = $HV_SDT;
        $NEW_ROW->HV_NGAYSINH = $HV_NGAYSINH;
        $NEW_ROW->HV_GIOITINH = $HV_GIOITINH;
        $NEW_ROW->HV_TTVIECLAM = $HV_TTVIECLAM;
        $NEW_ROW->HV_DANTOC = $HV_DANTOC;
        $NEW_ROW->HV_HOCVAN = $HV_HOCVAN;
        $NEW_ROW->HV_CHUANDAURA = $HV_CHUANDAURA;
        $NEW_ROW->HV_NOILAMVIECDUKIEN = $HV_NOILAMVIECDUKIEN;
        $NEW_ROW->id_DOITUONG = $id_DOITUONG;
        $NEW_ROW->save();
    }
}
