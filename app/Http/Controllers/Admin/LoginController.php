<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;

class LoginController extends Controller
{
    public function getLogin()
    {
        return view('admin.auth.login');
    }
    public function login(LoginRequest $request)
    {
        
          if(auth()->guard('admin')->attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            //   notify()->success('تم الدخول بنجاح');
              return redirect()->route('admin.dashboard');
          }
        //   notify()->error('حدث خطأ في البيانات برجاء المحاولة مجددا');
          return \redirect()->back()->with(['error'=>'هناك خطأ بالبيانات'])->withInput($request->all());
    }
}
