<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class PembayaranController extends Controller
{

    public function store(Request $request)
    {
        // nama pembeli
        $cusName = $request->input('cusName');

        // no antrian
        $noAntrian = $request->input('noAntrian');

        // produk dipilih
        $produkDipilih = $request->input('listKeranjang');
        $produkDipilihJs = $produkDipilih;
        
        $produkDipilih = json_decode($produkDipilih, true);

        $subtotal = 0;

        $ids = array();
        foreach ($produkDipilih as $i=>$j) {
            array_push($ids, $i);
            $subtotal += $j[0] * $j[2];
        }

        // total
        $total = $subtotal;
        
        // komen
        $komen = array();
        foreach($ids as $i){
            $j = $request->input(sprintf("catatan-%s",$i));
            array_push($komen, array($i,$j));
        }

        // Diskon
        $diskon = $request->input('diskon');
        if ($diskon == 'anggotaLab'){
            $diskon = 'Anggota Lab';
            $jumlahDiskon = $total * 0.15;
            $total -= $total * 0.15;
            $persenDiskon = "15%";
        } elseif ($diskon == 'asistenLab') {
            $diskon = 'Asisten Lab';
            $jumlahDiskon = $total * 0.25;
            $total -= $total * 0.25;
            $persenDiskon = "25%";
        } else {
            $diskon = "";
            $jumlahDiskon = 0;
            $persenDiskon = "";
        }
        
        // Potongan
        $potongan = $request->input('potongan');
        if ($potongan == ""){
            $potongan = 0;
        }else {
            $total -= $potongan;
        }
        // return $produk2;

        $page = "Transaksi";
        return view('kasir.container.pembayaran', compact('page', 'cusName','noAntrian','produkDipilih','produkDipilihJs','total','subtotal','komen','diskon','jumlahDiskon','persenDiskon','potongan'));
    }
}
