<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietgh extends Model
{
    //
    protested $table = "chitietgh";

    //moi qh với sanpham và gio hang
    public function sanpham(){
    	return $this->belongTo('App\sanpham','MaSP','MaGH');
    }
    public function giohang(){
    	return $this->belongTo('App\giohang','MaGH');
    }
}
