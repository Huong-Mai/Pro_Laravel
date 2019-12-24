<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Session;

use App\users;
use App\khtv;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function username()
     {
        return 'username';
        }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function getLogin(){
        return view('page.dang-nhap');
    }
    public function postLogin(Request $request) {

        //$request = users::all();
        //dd($slide);

        //dd($request->all());
       // Kiểm tra dữ liệu nhập vào

       $credentials = $request->only('TenDN', 'Matkhau');

        $request->validate([
            'username' =>'required',
            'password' => 'required|min:6|max:20'
        ],
        [
            'username.required' => 'Bạn chưa nhập tên đăng nhập',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            'password.max'=> 'Mật khẩu phải chứa nhiều nhất 20 ký tự'
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect('index');
        }
        else {
			// Kiểm tra không đúng sẽ hiển thị thông báo lỗi
            Session::flash('errors', 'Email hoặc mật khẩu không đúng!');
            echo '<script>alert("Đậu xanh")</script>';
			return view('page.dang-nhap');
		}

    }
    public function getsignup()
    {
        return view('page.dang-ki');
    }
    public function postsignup(Request $req)
    {
        $req->validate([
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
        // $xacnhandk = array('TenDN' => $req->username, 'Matkhau' => $req->password);
        // if (Auth::attempt($xacnhandk)) {
        //     return redirect()->back()->with(['flag' => 'success', 'message' => 'Đăng kí thành công!']);
        // } else {
        //     return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng kí không thành công!']);
        // }
        $khtv = new khtv();
        $account = new users;

        $khtv->HoTen = $req->fullname;
        $khtv->Email = $req->email;
        $khtv->TenDN = $req->username;
        $khtv->SDT = $req->phone;
        $khtv->DiaChi = $req->adress;

        $khtv->save();

        $account->TenDN = $req->username;
        $account->Matkhau = $req->password;
        $account->Level=0;

        $account->save();

        return redirect('dang-nhap');
    }
}
