<?php

namespace Controller;

use function Core\view;

class DashboardController extends Controller
{

  public static function index()
  {
    return view('dashboard');
  }
}
