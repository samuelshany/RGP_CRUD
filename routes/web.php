<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

use function App\Helpers\getLangs;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin/login', function () {

    $admins = Admin::get();
    if(count($admins)==0)
    {
        $admin = new Admin();
        $admin->user_name = 'admin@rgb.com';
        $admin->password=bcrypt('adminadmin');
        $admin->save();
    }
    if(!Session::has('local'))
    {
        Session::put('local', 'en');
    }
        return view('admin.login');
    })->name('login');
    Route::post('admin/login', [AdminController::class, 'loginHandel']);
    Route::get('/logout',function(){
       Auth::guard('admin')->logout();
        return redirect()->route('login');
    })->middleware('auth:admin');




Route::post('/changeLang',function(Request $request){

        Session::put('local', $request->lang);

    return redirect()->back();
})->name('changeLang');
Route::get('/',[UserController::class,'index']);
