<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hoadon extends Model
{
    //
    protected $table = "hoadon";

    public function khachhang()
    {
        return $this->belongsTo('App\khachhang', 'MaHD', 'MaHD');
    }
    public function httt()
    {
        return $this->hasOne('App\httt', 'MaHTTT', 'MaHTTT');
    }
    public function nhanvien()
    {
        return $this->belongsTo('App\nhanvien', 'MaHD', 'MaHD');
    }
}
