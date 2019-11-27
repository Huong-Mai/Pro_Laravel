<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    //
    protected $table = "sanpham";
    
    //
    public function loaisp(){
    	// 'duongdan','khoa ngoai cua sp va lsp','khoa chinh cua ban loaisp'
    	//1sp chi thuoc 1 loaisp
    	return $this->belongsTo('App\loaisp','TenLoai','MaSp');
    } 
    public function chitietgh(){
    	//1sp có ở nhiều giỏ hàng
    	return $this->hasMany('App\chitietgh','MaSP','MaSP','MaGH');
    }
}
