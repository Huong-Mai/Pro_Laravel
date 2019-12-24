<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loaisp extends Model
{
    //
    protected $table = "loaisp";

    //tao quan he voi sanpham
    public function sanpham(){
    	// 'duongdan','khoa ngoai cua sp va lsp','khoa chinh cua ban loaisp'
    	// 1 loaisp cos nhieu sp: hasMany
    	return $this ->hasMany('App\sanpham','TenLoai','MaLoai');
    }
}
