<?php

namespace App\Http\Controllers;

use App\Models\Attribution;
use Illuminate\Http\Request;

class AttributionController extends Controller
{
    public function index(){
        return view('inscriptions.list');
    }
    public function create(){
        return view('inscriptions.create');
    }

    public function edit(Attribution $attribut){
        return view('inscriptions.edit');
    }
}
