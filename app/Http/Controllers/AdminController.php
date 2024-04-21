<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loginHandel(Request $request)
    {
        //return $request->email;
        if(auth()->guard('admin')->attempt(['user_name'=>$request->user_name,'password'=>$request->password]))
        {
            return redirect('/admin/products');
        }
        else
        {
            return redirect('/admin/login');
        }
    }
}
