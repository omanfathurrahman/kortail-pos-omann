<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function store(Request $request)
    {
        // $transaksiId = array();
        // foreach(Transaksi::all() as $i) {
        //     array_push($transaksiId, $i->id);
        // }
        // $noPesanan = max($transaksiId);
        if (!Transaksi::exists()) {
            $noPesanan = 1;
        } else {
            $noPesanan = Transaksi::latest()->first()->id+1;
        }

        
        $row = new Transaksi;
        
        $cusName = $request->input('cusName');
        $row->pembeli = $cusName;
        
        $noAntrian = $request->input('noAntrian');
        
        // $arr = array();
        $produkDipilih = $request->input('produkDipilih');
        
        $produkDipilih = json_decode($produkDipilih, true);
        
        // $ids = $request->input('ids');
        $total = $request->input('total');
        $row->total = $total;
        
        $subtotal = $request->input('subtotal');
        $row->subtotal = $subtotal;

        $diskon = $request->input('diskon');

        $persenDiskon = $request->input('persenDiskon');

        $jumlahDiskon = $request->input('jumlahDiskon');
        $jumlahDiskon = (int) $jumlahDiskon;
        if ($jumlahDiskon != 0) {
            $row->diskon = $jumlahDiskon;
        }

        $potongan = $request->input('potongan');
        $potongan = (int) $potongan;
        if ($potongan != 0) {
            $row->potongan = $potongan;
        }
        
        $metodePembayaran = $request->input('metodePembayaran');
        
        switch ($metodePembayaran) {
            case 'Tunai':
                $metode = 1;
                break;
            case 'QRIS':
                $metode = 2;
                break;
        }
        $row->metode_pembayaran_id = $metode;
        $row->users_id = Auth::user()->id;

        $row->save();
        
        // dd($arr);
        foreach($produkDipilih as $i=>$j) {
            $row2 = new DetailTransaksi;
            $row2->kuantitas = $j[0];
            $row2->transaksi_id = $noPesanan;
            $row2->produk_id = $i;
            $row2->save();
        }

        $page = "Transaksi";

        return view('kasir/container/checkOut', compact('page', 'cusName', 'noPesanan', 'noAntrian','metodePembayaran', 'produkDipilih', 'subtotal','diskon','persenDiskon','jumlahDiskon','potongan', 'total'));
    }
}
