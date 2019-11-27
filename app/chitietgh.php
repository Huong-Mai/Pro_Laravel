<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chitietgh extends Model
{
    //
    protested $table = "chitietgh";

    //moi qh với sanpham và gio hang
    public function sanpham(){
    	return $this->hasMany('App\sanpham','MaSP','ID');
    }
    public function giohang(){
    	return $this->
    }
}
