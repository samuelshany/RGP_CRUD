<?php
namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
trait Photo {
  // some code...

  public function removePhoto($photo)
  {
    if(file_exists(public_path($photo)))
        {
            unlink(public_path($photo));
        }
  }
 public function storePhoto(Request $request)
 {
    $image=$request->file('photo');
    $name=rand(1,10000).time().'.'.$image->getClientOriginalExtension();

    $imageName5='images/products/'.$name;

   $request->photo->move(public_path('images/products'),$imageName5);
   return $imageName5;
 }
}
?>
