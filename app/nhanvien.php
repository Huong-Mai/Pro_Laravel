<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nhanvien extends Model
{
    //
    protected $table = "nhanvien";

    public function taikhoan()
    {
        return $this->hasOne('App\taikhoan', 'TenDN', 'MaNV');
    }
    public function hoadon()
    {
        return $this->hasMany('App\hoadon', 'MaNV', 'MaNV');
    }
}
