<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Traits\Local;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    use Local;
    public function index()
    {  if(!Session::has('local'))
        {
            Session::put('local', 'en');
        }
        $this->getLocal();

        $products = Product::active()->selection()->with(['category'=>function($query)
        { $lang = Session::get('local');
            $query->select('id','name_'.$lang.' as name')->get();
        }])->get();

        return view('user.products',get_defined_vars());
    }
}
