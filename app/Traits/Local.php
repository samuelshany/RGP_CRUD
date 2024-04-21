<?php
namespace App\Traits;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

trait Local {
  // some code...

  public function getLocal()
  {
    return App::setlocale(Session::get('local'));
  }

}
?>
