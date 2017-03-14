<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RouteRefresh;
use Route;

class RouteRefreshControll extends Controller
{
    public function index()
    {
      $router = new Route;
      $router_temp = $router::getRoutes();
      foreach ($router_temp as $t) {

        $rout = new RouteRefresh;

      if( $t->getName() == 'login' || $t->getName() == 'logout' || $t->getName() == 'register' ||  $t->getName() == 'password.request' || $t->getName() == 'password.email' || $t->getName() == 'password.reset')
      continue;
      elseif($t->getName() != null) {
      $rout->firstOrCreate(['name' =>  $t->getName()]);
    }
        else continue;
      }
      return back();
    }
}
