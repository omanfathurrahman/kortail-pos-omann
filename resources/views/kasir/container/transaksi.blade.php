@extends('kasir.layouts.main')

@section('container')
<div 
    class="flex w-full p-5 bg-greyBgMain gap-5 static"
    x-data="{
        products: window.products,
        merchants: window.merchants, 
        kategori: window.kategori,

        {{-- keranjangKosong: true, --}}
        
        merchantDipilih: 'Semua',
        kategoriDipilih: [],
        {{-- xshow: xshow, --}}
        cari: cari,
        }"
    >
    <main class="w-full flex flex-col gap-2 static">

        <div class="px-5 py-3 bg-white flex justify-between rounded-lg shadow-sm sticky top-5 items-center">
            <h1 class="text-3xl font-semibold inline-block after:mt-1 after:block after:content-[''] after:h-2 after:bg-orenKortail">
                Transaksi
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
                <select class="inline-block border border-slate-300 rounded-lg w-fit focus:ring-0 focus:border-slate-300">
                    <option>Semua</option>  
                    <template x-for="merchant of merchants">
                        <option x-text="merchant.nama" x-bind:value="merchant.nama"></option>
                    </template>
                </select>
            </div>
        </div>

        <div class="flex flex-col gap-3 px-5 py-3 bg-white justify-start rounded-lg shadow-sm text-center">

            <ul class="flex gap-2 w-full">
                <template 
                    x-for="item of kategori"
                    >
                    <li>
                        <button 
                            x-on:click="oren($el, item.id, kategoriDipilih)" 
                            class="inline-flex justify-between items-center py-1 px-3 w-full text-slate-800 
                            rounded-lg border cursor-pointer hover:border-slate-400 ease-in-out duration-300" 
                            x-text="item.nama">
                        </button>
                    </li>
                </template>
            </ul>

            <div class="grid grid-cols-5 gap-3">
                <template x-for="product of products">
                    <div 
                        x-on:click="tambahKeKeranjang(product.id, product.nama, product.harga);"
                        x-show="xshow(product.kategori_id, kategoriDipilih, product.merchant_id, merchantDipilih, product.nama, cari)" 
                        class="product flex flex-col items-center border py-2 rounded-lg hover:border-slate-400 ease-in-out duration-300 justify-evenly h-[17rem]"
                        >
    
                        <div class="flex flex-col justify-center m-3">
                            <img class="object-contain h-28 w-36" x-bind:src="window.scrLaravel(product.image)" alt="">
                        </div>
                        <div class="flex flex-col items-center m-3">
                            <h3 class="font-semibold" 
                                x-text="product.nama"></h3>
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


    <div class="sticky top-5 p-5 w-5/12 rounded-lg bg-white h-[48rem]">
        <form class="flex flex-col justify-between h-full" action="{{URL::to('transaksi/pembayaran')}}" method="POST">
            @csrf
            <div class=" flex flex-col gap-3">


                <div class="">
                    <label class="text-xl font-medium" for="cus-name">Nama Customer</label>
                    <!-- input cus-name -->
                    <input 
                        class="h-7 border border-slate-300 rounded-lg w-full" 
                        type="text" 
                        name="cusName" 
                        id="cusName"
                        placeholder="Masukkan nama pembeli"
                        required
                        >
                </div>

                <div class="">
                    <label class="text-xl font-medium" for="noAntrian">Nomor Antrian</label>
                    <!-- input noAntrian -->
                    <input 
                        class="h-7 border border-slate-300 rounded-lg w-20 block" 
                        type="number" 
                        name="noAntrian" 
                        id="noAntrian"
                        >
                </div>

                <div class="flex flex-col gap-1">
                    <h3 class="text-xl font-medium">Keranjang</h3>

                    <!-- KERANJANG -->
                    <div id="keranjang" class="flex flex-col gap-2 border border-slate-300 rounded-lg w-full py-2 px-2">
                        <span id="keranjangKosong" class="text-sm">Keranjang masih kosong</span>

                        <!-- input catatan-id -->
                    </div>
                    <input type="hidden" name="listKeranjang" id="listKeranjang">

                </div>
                <div class="">
                    <label class="text-xl font-medium" for="diskon">Diskon</label>
                    <!-- input diskon -->
                    <select class="block py-0.5 px-10 border border-slate-300 rounded-lg" name="diskon">
                        <option value="pilihDiskon" selected>Pilih Diskon</option>
                        <option value="anggotaLab">Anggota Lab</option>
                        <option value="asistenLab">Asisten Lab</option>
                    </select>
                </div>

                <div class="">
                    <label class="text-xl font-medium" for="potongan">Potongan</label>
                    <!-- input potongan -->
                    <input class="h-7 border border-slate-300 rounded-lg block text-sm font-thin w-60" type="number" name="potongan" placeholder="Masukkan potongan jika ada">
                </div>

            </div>
            <div class="flex flex-col gap-2">

                <input class="w-full bg-orenKortail py-2 border border-slate-700 rounded-lg" type="submit" value="Bayar">
            </div>
        </form>
    </div>
</div>

<script>
var cari = '';
var products = <?php echo $productsJs; ?>;
var merchants = <?php echo $merchantsJs; ?>;
var kategori = <?php echo $kategoriJs; ?>;
</script>

<script src="{{ asset('js/produk.js') }}"></script>
@endsection