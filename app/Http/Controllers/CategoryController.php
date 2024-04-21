<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Traits\Local;
use App\Traits\Response;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    use Local;
    use Response;
    //
    public function index()
    {
        $this->getLocal();
        $categories = Category::selection()->get();
        return view('categories.categories',get_defined_vars());
    }
    public function products($id)
{
    $this->getLocal();
  $category = Category::where('id',$id)->selection()->with(['products'=>function($query){
    $query->selection();
}])->first();
  return view('categories.products',get_defined_vars());
}
    public function create()
    {
        $this->getLocal();
        return view('categories.create');
    }
    public function store(CategoryRequest $request)
    {
        try
        {

            $category = Category::create($request->except('_token'));
            if(!$category)
            {
                return redirect('/categories')->with(['failed'=>'some thing went wrong']);
            }else
            {
                return redirect('/categories')->with(['sucess'=>'added']);
               // return $this->success(__('messages.categoryAdded'),$category);
            }

        }catch(\Exception $ex)
        {
            return $ex;
        }
    }
    public function destroy($id)
    {
        Product::where('category_id',$id)->delete();
        Category::where('id',$id)->delete();
        return redirect()->back();
    }
}
