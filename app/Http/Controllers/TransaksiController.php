<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Merchant;
use App\Models\Produk;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $merchants = Merchant::all();
        $products = Produk::all();

        $kategoriJs = $kategoris->toJson();
        $merchantsJs = $merchants->toJson();
        $productsJs = $products->toJson();
        $page = "Transaksi";

        return view('kasir/container/transaksi',
        compact('page', 'kategoris', 'merchants','products', 'productsJs', 'merchantsJs', 'kategoriJs'));
    }

}
