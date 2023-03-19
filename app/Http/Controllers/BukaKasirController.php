<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftKasir;
use PHPUnit\Framework\Constraint\IsEmpty;

class BukaKasirController extends Controller
{
    public function index()
    {
        if (!ShiftKasir::exists()) {
            $status = 'tutup';
            $rowId = 1;
        } else {
            $status = ShiftKasir::latest()->first()->status;
            $rowId = ShiftKasir::latest()->first()->id;
        }

        $page = "Home";

        return view('kasir/container/bukaKasir', compact('status', 'page', 'rowId'));
    }

}
