<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class Relatorios extends Controller
{
    public function index()
    {
      return view("relatorios.index");
    }
}
