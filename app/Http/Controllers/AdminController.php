<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index() { // View Login Admin
        return view('admin.account.login');
    }
    public function dashboard(){ // view Dashboard
        return view('admin.dashboard.dashboard');
    }

    public function login_admin(Request $request){// Đăng nhập vào Admin
        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();

        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/dashboard');
        }else{
            Session::put('message','Mật Khẩu Hoặc Tài Khoản không Đúng');
            return Redirect::to('/admin');
        }
    }
    public function logout(){// Đăng xuát admin
            Session::put('admin_name',null);
            Session::put('admin_id',null);
            return Redirect::to('/admin');
    }
   
}
