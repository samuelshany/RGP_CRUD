<?php

namespace App\Http\Controllers;

use App\Charts\ProductsChart;
use App\Charts\ProductsChartDonat;
use App\Models\Category;
use App\Models\Product;
use App\Traits\Local;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReportController extends Controller
{
    use Local;
    //
    public function index()
    {
        $this->getLocal();
        $categories = Category::selection()->with('products')->get();
        $products = Product::selection()->get();
        return view('reports.index',get_defined_vars());
    }
    public function filter(Request $request)
    {
        $this->getLocal();
        $start = $request->from;
        $end= $request->to;
        $products = Product::selection()->whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->get();


        return view('reports.index2',get_defined_vars());

    }
    public function index2(ProductsChart $chart,ProductsChartDonat $chart2)
{
    $lang = Session::get('local');
    $products = [];
    $cats = Category::select('id','name_'.$lang.' as name')->get();
    //return $categories;
  $categories =[];
    foreach($cats as $cat)
    {
        $prods = Product::where('category_id',$cat->id)->get();
        array_push($products,count($prods));
        array_push($categories,$cat->name);

    }
    return view('reports.reports', ['chart' => $chart->build($categories,$products),'chart2'=> $chart2->build($categories,$products)]);
}
}
