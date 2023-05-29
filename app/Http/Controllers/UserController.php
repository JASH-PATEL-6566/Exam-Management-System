<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\user;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function login(Request $request){
        $user = user::where(['email' => $request->email])->first();
        if($user && Hash::check($request->input("password"), $user->password)){
            $request->session()->put("user",$user);
            return redirect("/user");
        }
        return "Username and password is not matched.";
    }

    function register(Request $req){
        $user = new user();
        $user->first_name = $req->input("f_name");
        $user->last_name = $req->input("l_name");
        $user->gender = $req->input("gender");
        $user->email = $req->input("email");
        $user->password = Hash::make($req->input("password"));
        $user->mobile = $req->input("phone");
        $user->address = $req->input("address");
        $user->save();
        return redirect("/");
    }

    function logout(){
        Session::forget("user");
        return redirect("../");
    }

    function logoutAdmin(){
        Session::forget("admin");
        return redirect("../admin_login");
    }

    function admin_login(Request $request){
        $user = admin::where(['email' => $request->email])->first();
        if($user && $request->input("password") == $user->password){
            $request->session()->put("admin",$user);
            return redirect("/admin");
        }
        return "Username and password is not matched.";
    }
}
