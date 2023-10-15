<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Niveaux;


class NiveauController extends Controller
{
    public function index(){
        return view('niveaux.list');
    }
    public function create(){
        return view('niveaux.create');
    }

    public function edit(Niveaux $niveau){
        return view('niveaux.edit', compact('niveau'));
    }
}
