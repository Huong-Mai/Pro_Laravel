<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\sanpham;
use App\loaisp;
use App\taikhoan;
use App\khachhangtv;
//use hash;
use Session;
class PageController extends Controller
{
    //

	public function getIndex(){
		$slide = Slide::all();
		$new_sanpham = sanpham::where('new',1)->get();
		$top_sanpham = sanpham::where('new',0)->get();

		//dd($new_sanpham);
		return view('page.trang-chu',compact('slide','new_sanpham','top_sanpham'));
		//print_r($slide);
		//exit();
	}
	public function getloaisp($loai){
		$sp_theoloai = sanpham::where('TenLoai',$loai)->get();
		$sp_khac = sanpham::where('TenLoai',"<>",$loai)->paginate(3);
		$tenloai = loaisp::all();
		$loaisp = loaisp::where('TenLoai',$loai)->first();
		return view('page.loai-sp', compact('sp_theoloai','sp_khac','tenloai','loaisp'));
	}
	public function getsanpham($id){
		$sanpham = sanpham::where('MaSP',$id)->first();

		$sptuongtu = sanpham::where('TenLoai', $sanpham->TenLoai)->where('MaSP','<>',$id)->paginate(3);

		$top_sanpham = sanpham::where('new',0)->paginate(3);

		$new_sanpham = sanpham::where('new',1)->paginate(3);

		return view('page.san-pham',compact('sanpham','sptuongtu','top_sanpham','new_sanpham'));
	}
	public function getlienhe(){
		return view('page.lien-he');
	}
	public function getgioithieu(){
		return view('page.gioi-thieu');
	}


}

