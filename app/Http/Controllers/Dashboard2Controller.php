<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShiftKasir;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class Dashboard2Controller extends Controller
{
    //
    public function index()
    {
        $userLogin = Auth::user()->name;
        if (!isset($status)) {
            $status = 'tutup';
        }

        $page = 'Home';

        $totalToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->sum('total');
        $countToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->count('id');

        $totalTunaiToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->sum('total');
        $countTunaiToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->count('id');

        $totalQrisToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 2)
                ->sum('total');        
        $countQrisToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 2)
                ->count('id');

        if (DB::table('transaksi')->count() > 0) {
            $shift_id = DB::table('transaksi')->latest()->first()->users_id;

            $totalTunaiSesi = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->where('users_id', $shift_id)
                ->sum('total');
        } else {
            $totalTunaiSesi = 0;
        }

        if (Session::has('tunai_awal')) {
            $tunai_awal = Session::get('tunai_awal');
        } else {
            $tunai_awal = 0;
        }

        // dd(Session::get('shift_id'));
        return view('kasir/container/dashboard2',
        compact('page', 'status', 'userLogin', 'totalToday', 'countToday', 'totalTunaiToday', 'countTunaiToday', 'totalQrisToday', 'countQrisToday', 'totalTunaiSesi', 'tunai_awal'));
    }

    public function store(Request $request) {
        date_default_timezone_set('Asia/Jakarta');

        $row = new ShiftKasir;
        $row->waktu_buka = date('d-m-y h:i:s');
        $row->tunai_awal = $request->input('tunaiAwal');
        $row->status = 'buka';
        $row->shift_id = $request->input('shiftKasir');
        $row->users_id = Auth::id();
        $row->save();

        $userLogin = Auth::user()->name;
        $rowId = ShiftKasir::latest()->first()->id;
        $status = 'buka';
        $page = 'Home';
        $tunai_awal = $request->input('tunaiAwal');

        Session::put('tunai_awal', $request->input('tunaiAwal'));
        Session::put('shift_id', $request->input('shift_id'));

        $totalToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->sum('total');
        $countToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->count('id');

        $totalTunaiToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->sum('total');

        $countTunaiToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->count('id');

        $totalQrisToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 2)
                ->sum('total');        
        $countQrisToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 2)
                ->count('id');

        $totalTunaiSesi = 0;

        return view('kasir/container/dashboard2', 
        compact('rowId', 'status','page', 'tunai_awal', 'userLogin', 'totalToday', 'countToday', 'totalTunaiToday', 'countTunaiToday', 'totalQrisToday', 'countQrisToday', 'totalTunaiSesi'));
    }

    public function update(Request $request, $id) {

        date_default_timezone_set('Asia/Jakarta');
        $row = ShiftKasir::findOrFail($id);
        $row->waktu_tutup = date('d-m-y h:i:s');
        $row->tunai_akhir = (int) $request->input('tunaiAwal');
        $row->status = 'tutup';
        $row->save();

        $status = 'tutup';
        $page = 'Home';

        $totalToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->sum('total');
        $countToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->count('id');

        $totalTunaiToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->sum('total');
        $countTunaiToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 1)
                ->count('id');

        $totalQrisToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 2)
                ->sum('total');        
        $countQrisToday = DB::table('transaksi')
                ->whereDate('created_at', today())
                ->where('metode_pembayaran_id', 2)
                ->count('id');

        $totalTunaiSesi = 0;

        $tunai_awal = 0;

        // dd($row);
        return view('kasir/container/dashboard2', compact( 'status','page', 'totalToday', 'countToday', 'totalTunaiToday', 'countTunaiToday', 'totalQrisToday','countQrisToday', 'totalTunaiSesi', 'tunai_awal'));
    }

}
