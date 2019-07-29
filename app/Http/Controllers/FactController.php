<?php

namespace App\Http\Controllers;

use App\Fact;
use Illuminate\Http\Request;

class FactController extends Controller
{
    public function hello()
    {
	    return view('welcome');
    }
    
    public function index()
    {
        $facts = Fact::all();
    
        return view('facts.index', compact('facts'));
    }
    
    public function show(Fact $fact)
    {
        return view('facts.show', compact('fact'));
    }
    
    public function store()
    {
        $attributes = request()->validate([
            'text' => 'required',
        ]);
        
        auth()->user()->facts()->create($attributes);
        
        return redirect('/facts');
    }
}
