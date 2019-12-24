<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class giohang extends Model
{
    //
    protected $table = "giohang";

    public function chitietgh()
    {
        return $this->hasMany('App\chitietgh', 'MaGH', 'MaGH');
    }
    public function khachhang()
    {
        return $this->belongsTo('App\khachhang', 'MaKH', 'MaGH');
    }
}
