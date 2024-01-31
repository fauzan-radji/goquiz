<?php

namespace Controller;

use Core\Auth;

use function Core\view;

class HomeController extends Controller
{
  public static function index()
  {

    return view('home', [
      'isLoggedIn' => Auth::user() !== null
    ]);
  }
}
