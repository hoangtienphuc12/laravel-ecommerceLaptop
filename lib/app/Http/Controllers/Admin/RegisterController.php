<?php

namespace App\Http\Controllers\Admin;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function getRegister(){
        return view('backend.register');
    }
    public function postRegister(Request $request){
        $name = $request ->input("name");
        $email = $request ->input("email");
        $password = $request ->input("password");
        $repassword = $request ->input("repassword");

        $user = User::where("email",$email)->first();

        if($user){
            return back()->withInput()->with('error','Email này đã tồn tại');
        }
        if($password != $repassword){
            return back()->withInput()->with('error','Mật khẩu nhập lại không đúng');
        }
        if($password== '' || $name == '' || $email =='' || $repassword == ''){
            return back()->withInput()->with('error','Các trường không được đẻ trống');
        }
        else{
            $userr = new User;
            $userr ->name = $name;
            $userr ->email = $email;
            $userr ->password = Hash::make($password);
            $userr ->level = 1;
            $userr->save();
            return redirect()->intended('login');
        }
    }
}
