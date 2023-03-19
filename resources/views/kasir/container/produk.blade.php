@extends('kasir.layouts.main')

@section('container')
<div 
    class="flex w-full p-5 bg-greyBgMain gap-5 static"
    x-data="{
        products: window.products,
        merchants: window.merchants, 
        kategori: window.kategori,
        
        merchantDipilih: 'Semua',
        
        kategoriDipilih: [],
        xshow: xshow,
        cari: cari,
        }";
    >

    <main class="w-full flex flex-col gap-2 static">
        <div class="px-5 py-3 bg-white flex justify-between rounded-lg shadow-sm sticky top-5 items-center">
            <h1
                class="text-3xl font-semibold inline-block after:mt-1 after:block after:content-[''] after:h-2 after:bg-orenKortail">
                Produk
            </h1>
            <div class="flex gap-3 h-fit">
                <div class="flex items-center border border-slate-300 px-3 rounded-lg">
                    <img class="w-4 h-4" src="{{ URL::asset("img/search.png") }}" alt="">
                    <input 
                        x-model="cari"
                        class="border-none focus:ring-0 focus:border-none" 
                        type="text" name="" id="" 
                        placeholder="Cari produk">
                </div>
                <select x-model="merchantDipilih" class="inline-block border border-slate-300 rounded-lg w-fit focus:ring-0 focus:border-slate-300">
                    <option>Semua</option>

                    <template x-for="merchant of merchants">
                        <option x-text="merchant.nama" x-bind:value="merchant.nama"></option>
                    </template>

                </select>
            </div>
        </div>

        <div class="flex flex-col gap-3 px-5 py-3 bg-white justify-start rounded-lg shadow-sm">
            <div class="flex justify-between items-center">
                <ul class="flex gap-2 w-full">

                {{-- KATEGORI --}}
                <template 
                    x-for="item of kategori"
                    >
                    <li>
                        <button x-on:click="oren($el, item.id, kategoriDipilih)" class="inline-flex justify-between items-center py-1 px-3 w-full text-slate-800 
                        rounded-lg border cursor-pointer hover:border-slate-400 ease-in-out duration-300" x-text="item.nama">
                        </button>
                    </li>
                </template>

                </ul>

                <a href="{{URL::to('transaksi')}}">

                    <div class="flex justify-center items-center w-52 bg-orenKortail border border-slate-800 rounded-lg px-4 py-1 gap-2">
                        <p>+</p>
                        <p class="">Tambah Transaksi</p>
                    </div>
                </a>
            </div>

            <div class="grid grid-cols-6 gap-3 text-center">
                <template x-for="product of products">
                <div 
                    x-show="xshow(product.kategori_id, kategoriDipilih, product.merchant_id, merchantDipilih, product.nama, cari)" 
                    class="flex flex-col items-center border py-2 rounded-lg hover:border-slate-400 ease-in-out duration-300 justify-evenly h-[17rem]"
                    >

                    <div class="flex flex-col justify-center m-3">
                        <img class="object-contain h-28 w-36" x-bind:src="window.scrLaravel(product.image)" alt="">
                    </div>
                    <div class="flex flex-col items-center m-3">
                        <h3 class="font-semibold" x-text="product.nama"></h3>
                        <p 
                            class="font-semibold text-orenKortailDark" 
                            x-text="product.harga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 });"></p>
                        <p class="text-sm">Tersedia 16 Stok</p>
                    </div>
                </div>
                </template>
            </div>

        </div>

    </main>

</div>

<script>
    // var kategoriDipilih = [];
    var cari = '';
    var products = <?php echo $productsJs; ?>;
    var merchants = <?php echo $merchantsJs; ?>;
    var kategori = <?php echo $kategoriJs; ?>;
</script>
<script src="{{ asset('js/produk.js') }}"></script>

@endsection