<?php
namespace App\Traits;
trait Response {
  // some code...

  public function success($message,$data)
  {
   
    return [
        'status'=>200,
        'message'=>$message,
        'data'=>$data
    ];
  }
  public function notFound($message)
  {
   // return 1;

    return [
        'status'=>404,
        'message'=>$message
    ];
  }
}
?>
