<?php

namespace App\Http\Controllers;

use App\Models\Loan;

class PeminjamanController extends Controller
{
    public function index()
    {
        return view('peminjaman.index', [
            'loans' => Loan::with('user', 'book')->get(),
        ]);
    }
}
