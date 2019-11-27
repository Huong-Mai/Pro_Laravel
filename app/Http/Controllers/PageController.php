<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slide;
use App\sanpham;
use App\loaisp;
use App\taikhoan;
use App\khachhangtv;
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
	public function getlogin(){
		return view('page.dang-nhap');
	}
	public function postlogin(){

	}
	public function getsignup(){
		return view('page.dang-ki');
	}
	public function postsignup(Request $req){
		$this->validate($req,
			[
			'email'=>'required|email',
			'fullname'=>'required',
			'username'=>'required|unique:taikhoan,TenDN',
			'password'=>'required|min:6|max:20',
			're_password'=>'required|same:password'

		],
		[
			'email.required'=>'Vui lòng nhập email',
			'email.email'=>'Không đúng định dạng email',
			'fullname.required'=>'Vui lòng nhập họ và tên',
			'username.required'=>'Vui lòng nhập tên đăng nhập',
			'username.unique'=>'Tên đăng nhập đã có người sử dụng',
			'password.required'=>'Vui long nhập mật khẩu',
			'password.min'=>'Mật khẩu ít nhật 6 kí tự',
			'password.max'=>'Mật khẩu nhiều nhất 20 kí tự',
			're_password.required'=>'Vui lòng nhập lại mật khẩu',
			're_password.same'=>'Mật khẩu không giống nhau'
		]);

		$khtv = new khachhangtv();
		$account = new taikhoan();
		$khtv->Hoten = $req->fullname;
		$khtv->Email = $req->email;
		$khtv->TenDN = $req->username;
		$account->TenDN = $req->username;
		$account->Matkhau =hash::make($req->password);
		$khtv->SDT =$req->phone;
		$khtv->Diachi= $req->adress;
		$khtv->save();
		$account->save();
		return redirect()->back()->with('thanhcong','Đăng kí tài khaonr thành công!');

	}
	
}

