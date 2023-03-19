<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Merchant;
use App\Models\Produk;

// use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        $merchants = Merchant::all();
        $products = Produk::all();

        $kategoriJs = $kategoris->toJson();
        $merchantsJs = $merchants->toJson();
        $productsJs = $products->toJson();

        $page = "Produk";

        return view('kasir/container/produk', 
        compact('page', 'kategoris', 'merchants', 'products', 'productsJs', 'merchantsJs', 'kategoriJs'));
    }
}
