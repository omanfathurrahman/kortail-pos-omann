<?php

namespace App\Http\Controllers;

use App\Models\Antrian;
use App\Models\DetailTransaksi;
use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    //
    public function index()
    {
        $rows = Antrian::all();
        $data = array();
        foreach ($rows as $i) {
            $pesanan = Transaksi::where('id', $i->noPesanan)->first();
            $produk = DetailTransaksi::where('transaksi_id', $i->noPesanan)->get();
            $arr = array();
            foreach ($produk as $i) {
                $produk = Produk::where('id', $i->produk_id)->first()->nama;
                array_push($arr, array($produk, $i->kuantitas));
            }
            array_push($data, Array($pesanan->pembeli, $pesanan->total,$arr, $pesanan->id));
        }
    
        return view('kasir/container/antrian',['page' => 'Antrian'], compact('data'));
    }

    public function store(Request $request)
    {
        $row = new Antrian;
        $row->noPesanan = $request->input('pesanan');
        $noPesanan = $row->noPesanan;
        if (!Antrian::where('noPesanan', $noPesanan)->first()) {
            $row->save();
        }

        $rows = Antrian::all();
        $data = array();
        foreach ($rows as $i) {
            $pesanan = Transaksi::where('id', $i->noPesanan)->first();
            $produk = DetailTransaksi::where('transaksi_id', $i->noPesanan)->get();
            $arr = array();
            foreach ($produk as $i) {
                $produk = Produk::where('id', $i->produk_id)->first()->nama;
                array_push($arr, array($produk, $i->kuantitas));
            }
            array_push($data, Array($pesanan->pembeli, $pesanan->total,$arr, $pesanan->id));
        }
        return view('kasir/container/antrian', ['page' => 'Antrian'], compact('data'));
    }

    public function destroy($id) {
        $row = Antrian::where('noPesanan', $id);
        $row->delete();

        $rows = Antrian::all();
        $data = array();
        foreach ($rows as $i) {
            $pesanan = Transaksi::where('id', $i->noPesanan)->first();
            $produk = DetailTransaksi::where('transaksi_id', $i->noPesanan)->get();
            $arr = array();
            foreach ($produk as $i) {
                $produk = Produk::where('id', $i->produk_id)->first()->nama;
                array_push($arr, array($produk, $i->kuantitas));
            }
            array_push($data, Array($pesanan->pembeli, $pesanan->total,$arr, $pesanan->id));
        }
    
        return view('kasir/container/antrian',['page' => 'Antrian'], compact('data'));
    }
}
