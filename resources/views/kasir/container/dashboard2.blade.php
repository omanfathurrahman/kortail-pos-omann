@extends('kasir.layouts.main')
{{-- MAIN CUYY --}}
@section('container')

<main class="w-full bg-greyBgMain p-5 flex flex-col gap-2">

    <div class="px-5 py-3 bg-white flex justify-start rounded-lg shadow-sm">
        <h1
            class="text-3xl font-semibold inline-block after:mt-1 after:block after:content-[''] after:h-2 after:bg-orenKortail">
            Dashboard
        </h1>
    </div>

    <div class="bg-white px-5 py-3 rounded-lg shadow-sm">
        <div class="grid grid-cols-3 gap-y-3 gap-x-6 w-full self-stretch">
            <div class="self-stretch bg-white rounded-lg border border-slate-300 col-span-2 flex items-center justify-between px-5 py-2">
                <div class="flex flex-col gap-2">
                    <h3 class="text-2xl font-normal">
                        Status kasir - {{ ucwords($status) }}
                    </h3>
                    {{-- <p class="text-lg leading-tight">
                        Kasir masih dalam keadaan tertutup.<br>
                        Buka kasir agar dapat melakukan transaksi
                    </p> --}}
                </div>
                <a href="{{ URL::to('home/bukaKasir') }}" class="block">
                    <div class="flex items-center text-lg font-medium px-6 py-1 bg-orenKortail rounded-lg border border-slate-800 hover:shadow-md ease-in-out duration-150">
                        @if ($status == 'buka')
                            Tutup Kasir
                        @else
                            Buka Kasir                            
                        @endif
                    </div>
                </a>
            </div>

            <div class="self-stretch bg-white rounded-lg border border-slate-300 row-span-2">
                <h3 class="text-2xl font-normal px-6 pt-3">
                    Kasir saat ini
                </h3>
                <div class="flex justify-between px-8 py-1 text-lg">
                    <p class="">
                        Nama<br>
                        NIM<br>
                        Kelas
                    </p>
                    <div class="flex gap-4">
                        <p class="">
                            :<br>
                            :<br>
                            :
                        </p>
                        <p class="">
                            <span class="font-medium">{{ isset($userLogin) ? $userLogin : "-" }}</span>
                            <br>-<br>
                            -
                        </p>
                    </div>
                </div>
            </div>

            <div class="self-stretch bg-white rounded-lg border border-slate-300 px-7 py-2">
                <h3 class="text-xl">Total transaksi hari ini</h3>
                <p class="text-lg">{{ "Rp ".number_format($totalToday, 0, '.', ',') }}</p>
            </div>

            <div class="self-stretch bg-white rounded-lg border border-slate-300 px-7 py-2">
                <h3 class="text-xl">Jumlah transaksi hari ini</h3>
                <p class="text-lg">{{ $countToday. " Transaksi"}}</p>
            </div>

        </div>
    </div>

    <div class="bg-white px-5 py-3 rounded-lg flex flex-col gap-2.5 shadow-sm">
        <h2 class="text-2xl font-medium">
            Tunai di kasir
        </h2>
        <div class="grid grid-cols-3 gap-x-6 w-full">
            <div class="bg-white rounded-lg border border-slate-300 px-7 py-2">
                <h3 class="text-xl font-medium">Tunai awal :</h3>
                {{-- <p class="text-lg">{{ Session::has('tunai_awal') ? Session::get('tunai_awal') : "Masih kosong"}}</p> --}}
                <p class="text-lg">{{ isset($tunai_awal) ? "Rp ".number_format($tunai_awal, 0, '.', ',') : "Masih kosong"}}</p>
            </div>
            <div class="bg-white rounded-lg border border-slate-300 px-7 py-2">
                <h3 class="text-xl font-medium">Total transaksi tunai :</h3>
                <p class="text-lg">{{ $status == 'buka' ? "Rp ".number_format($totalTunaiSesi, 0, '.', ',') : "Rp ".number_format(0, 0, '.', ',') }}</p>
            </div>
            <div class="bg-white rounded-lg border border-slate-300 px-7 py-2">
                <h3 class="text-xl font-medium">Tunai akhir (seharusnya) :</h3>
                <p class="text-lg">{{ $status == 'buka' ? "Rp ".number_format(((int)$tunai_awal) + ((int)$totalTunaiSesi), 0, '.', ','): "Rp ".number_format(0, 0, '.', ',') }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white px-5 py-3 rounded-lg flex flex-col gap-2.5 shadow-sm">
        <h2 class="text-2xl font-medium">
            Tunai dan QRIS
        </h2>
        <div class="flex justify-between gap-6">
            <div class="flex basis-1/2 justify-around items-center px-4 py-2 rounded-lg border border-slate-300">
                <div class="flex flex-col items-center ">
                    <img src="{{ URL::asset('img/money.png') }}" alt="" class="w-16">
                    <h3 class="text-xl font-semibold">Tunai</h3>
                </div>
                <div class="w-96 flex flex-col gap-2">
                    <div class="flex flex-col border border-slate-300 rounded-lg p-2">
                        <h3 class="text-xl font-medium ">Total transaksi tunai hari ini:</h3>
                        <p class="text-lg">{{ "Rp ".number_format($totalTunaiToday, 0, '.', ',') }}</p>
                    </div>
                    <div class="flex flex-col border border-slate-300 rounded-lg p-2">
                        <h3 class="text-xl font-medium">Jumlah transaksi tunai hari ini:</h3>
                        <p class="text-lg">{{ $countTunaiToday. " Transaksi"}}</p>
                    </div>
                </div>
            </div>
            <div class="flex basis-1/2 justify-evenly items-center px-4 py-2 rounded-lg border border-slate-300">
                <div class="flex flex-col items-center">
                    <img src="{{ URL::asset('img/qr-scan.png') }}" alt="" class="w-16">
                    <h3 class="text-xl font-semibold">QRIS</h3>
                </div>
            <div class="w-96 flex flex-col gap-2">
                    <div class="flex flex-col border border-slate-300 rounded-lg p-2">
                        <h3 class="text-xl font-medium">Total transaksi QRIS hari ini:</h3>
                        <p class="text-lg">{{ "Rp ".number_format($totalQrisToday, 0, '.', ',') }}</p>
                    </div>
                    <div class="flex flex-col border border-slate-300 rounded-lg p-2">
                        <h3 class="text-xl font-medium">Jumlah transaksi QRIS hari ini:</h3>
                        <p class="text-lg">{{ $countQrisToday. " Transaksi"}}</p>
                    </div>
                </div> 
                
            </div>
        </div>
    </div>
</main>
@endsection