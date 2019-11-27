<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\taikhoan;
use App\khachhangtv;
use Hash;
use Session;

class UserController extends Controller
{
    //
    public function getlogin(){
		return view('page.dang-nhap');
	}
	public function postlogin(Request $req){
        $this->validate($req,[
            'username'=>'required',
            'password'=>'required'
        ],
        [
            'username.required'=>'Vui lòng nhập tên đăng nhập!',
            'password.required'=>'Vui lòng nhập mật khẩu!'
        ]

    );
    $xacnhan = array('TenDN'=>$req->email, 'Matkhau'=>$req->password);
    if(Auth::attempt($xacnhan)){
        return redirect()->back->with(['flag'=>'success','message'=>'Đăng nhập thành công!']);
    }
    else{
        return redirect()->back->with(['flag'=>'danger','message'=>'Đăng nhập không thành công!']);
    }
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
			'email.email'=>'Không đúng định dạng emai',
			'fullname.required'=>'Vui lòng nhập họ và tên',
			'username.required'=>'Vui lòng nhập tên đăng nhập',
			'username.unique'=>'Tên đăng nhập đã có người sử dụng',
			'password.required'=>'Vui long nhập mật khẩu',
			'password.min'=>'Mật khẩu ít nhật 6 kí tự',
			'password.max'=>'Mật khẩu nhiều nhất 20 kí tự',
			're_password.required'=>'Vui lòng nhập lại mật khẩu',
			're_password.same'=>'Mật khẩu không giống nhau'
		]);

		$khtv = new khachhangtv;
		$account = new taikhoan;

		$khtv->Hoten = $req->fullname;
		$khtv->Email = $req->email;
		$khtv->TenDN = $req->username;
        $account->TenDN = $req->username;
        $account->Matkhau = $req->password;

		//$account->Matkhau =hash::make($req->password);
		$khtv->SDT =$req->phone;
		$khtv->Diachi= $req->adress;
		$khtv->save();
		$account->save();
		return redirect()->back()->withErrors('thanhcong','Đăng kí tài khoản thành công!');

    }

}
