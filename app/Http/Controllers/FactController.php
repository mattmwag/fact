<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FactController extends Controller
{
    public function hello()
    {
	return view('welcome');
    }
}
