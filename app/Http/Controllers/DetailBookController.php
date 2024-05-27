<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class DetailBookController extends Controller
{
    public function index(Request $request): Response
    {
        return view('book.detail');
    }
}
