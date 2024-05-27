<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CreatePetugasController extends Controller
{
    public function index(Request $request): Response
    {
        return view('petugas.create');
    }
}
