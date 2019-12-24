<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class khachhang extends Model
{
    //
    protected $table = "khachhang";
    public function taikhoan()
    {
        return $this->hasOne('App\taikhoan', 'TenDN', 'MaKH');
    }
    public function giohang()
    {
        return $this->hasMany('App\giohang', 'MaKH', 'MaKH');
    }
    public function hoadon()
    {
        return $this->hasMany('App\hoadon', 'MaKH', 'MaKH');
    }
}
