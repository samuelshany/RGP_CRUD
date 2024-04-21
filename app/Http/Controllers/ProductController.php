<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Traits\Local;
use App\Traits\Photo;
use App\Traits\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

use function App\Helpers\getLangs;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   use Local;
   use Response;
   use Photo;


    public function index()
    {
        $this->getLocal();

        $products = Product::active()->selection()->with(['category'=>function($query)
        { $lang = Session::get('local');
            $query->select('id','name_'.$lang.' as name')->get();
        }])->get();

        return view('Products.products',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       $this->getLocal();
       $categories = Category::selection()->get();
        return view('Products.create',get_defined_vars());
    }

    public function store(ProductRequest $request)
    {
        //
        $this->getLocal();
        try{
            $imageName5 = "";
            if($request->hasFile('photo'))
           {
              $imageName5 = $this->storePhoto($request);
           }
           $data=$request->all();
           $data['photo']= $imageName5;
            $Product =Product::create($data);
            return redirect('admin/products/')->with(['succes'=>__('messages.added')]);
           // return $this->success(__('messages.productAdded'),$Product);
        }catch(\Exception $ex)
        {
            return redirect('admin/products/')->with(['failed'=>__('messages.failed')]);
           // return response()->json(['message'=>$ex]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        getLangs();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $this->getLocal();
        $product = Product::where('id',$id)->first();
        $categories = Category::selection()->get();
        if(!$product)
        {
            return $this->notFound(__('errors.productNotfound'));
        }
        return view('Products.update',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request)
    {
        $product = Product::where('id',$request->id)->first();
        if(!$product)
        {
            return $this->notFound(__('errors.productNotfound'));
        }
       try{
        $imageName5 = "";
        $data=$request->all();
            if($request->hasFile('photo'))
           {
              $imageName5 = $this->storePhoto($request);
              $data['photo']= $imageName5;
           }


        $product->update($data);
        return redirect('admin/products/')->with(['succes'=>__('sucess.updated')]);
       }catch(\Exception $ex)
       {
        return $ex;
       }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleted()
    {$this->getLocal();
       $products = Product::onlyTrashed()->active()->selection()->with(['category'=>function($query)
       { $lang = Session::get('local');
           $query->select('id','name_'.$lang.' as name')->get();
       }])->get();
        return view('Products.DeletedProducts',get_defined_vars());
    }
public function restore($id)
{
    $this->getLocal();

     Product::where('id',$id)->restore();
    return redirect('admin/products/deleted')->with(['succes'=>__('messages.restored')]);
}
    public function forcedelete($id)
    {
        $this->getLocal();

        $product = Product::withTrashed()->where('id',$id)->first();
       $this->removePhoto($product->photo);
        $product->forcedelete();
        return redirect('admin/products/deleted')->with(['succes'=>__('messages.deleted')]);
    }
    public function destroy( $id)
    { $this->getLocal();

        $product = Product::where('id',$id)->delete();

        return redirect('admin/products/')->with(['succes'=>__('messages.deleted')]);
    }
    public function deletegroup(Request $request)
    {
        $this->getLocal();
       Product::whereIn('id',$request->products)->delete();
       return redirect('admin/products/')->with(['succes'=>__('messages.deleted')]);
    }
}
