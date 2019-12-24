<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Authenticate;
use Illuminate\Http\Request;
use App\slide;
use Auth;
use DB;
use App\users;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use Symfony\Component\Mime\Message;

class UserController extends Controller
{
    //
    public function getlogin()
    {
        return view('page.dang-nhap');
    }
    public function postlogin(Request $req)
    {

        $username = $req->username;
        $password = $req->password;


        // echo "<pre>";
        // print_r($username);
        // print_r($password);
        // echo "</pre>";
        $check = DB::table('users')->where('TenDN',$username)->where('Matkhau',$password)->get();
        if($check){
            Session::put('message',$username);
            return view('page.trang-chu');
        }
        echo "<h1>Dang Nhap Thanh Cong</h1>";
    }
    public function getsignup()
    {
        return view('page.dang-ki');
    }
    public function postsignup(Request $req)
    {
        $this->validate(
            $req,
            [
                'email' => 'required|email',
                'fullname' => 'required',
                'username' => 'required|unique:users,TenDN',
                'password' => 'required|min:6|max:20',
                're_password' => 'required|same:password'

            ],
            [
                'email.required' => 'Vui lòng nhập email',
                'email.email' => 'Không đúng định dạng emai',
                'fullname.required' => 'Vui lòng nhập họ và tên',
                'username.required' => 'Vui lòng nhập tên đăng nhập',
                'username.unique' => 'Tên đăng nhập đã có người sử dụng',
                'password.required' => 'Vui long nhập mật khẩu',
                'password.min' => 'Mật khẩu ít nhật 6 kí tự',
                'password.max' => 'Mật khẩu nhiều nhất 20 kí tự',
                're_password.required' => 'Vui lòng nhập lại mật khẩu',
                're_password.same' => 'Mật khẩu không giống nhau'
            ]
        );
        $xacnhandk = array('TenDN' => $req->email, 'Matkhau' => $req->password);
        if (Auth::attempt($xacnhandk)) {
            return redirect()->back->with(['flag' => 'success', 'message' => 'Đăng kí thành công!']);
        } else {
            return redirect()->back->with(['flag' => 'danger', 'message' => 'Đăng kí không thành công!']);
        }
        $khtv = new khachhangtv;
        $account = new users;

        $khtv->Hoten = $req->fullname;
        $khtv->Email = $req->email;
        $khtv->TenDN = $req->username;
        $account->TenDN = $req->username;
        $account->Matkhau = $req->password;

        //$account->Matkhau =hash::make($req->password);
        $khtv->SDT = $req->phone;
        $khtv->Diachi = $req->adress;
        $khtv->save();
        $account->save();
        return redirect()->back()->withErrors('thanhcong', 'Đăng kí tài khoản thành công!');
    }
}
