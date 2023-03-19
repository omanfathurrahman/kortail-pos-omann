@extends('kasir.layouts.main')

@section('container')
@php
//  print_r($data);   
@endphp
<div class="flex w-full p-5 bg-greyBgMain gap-5 static">

    <main class="w-full flex flex-col gap-2 static">
        
        <div class="px-5 py-3 bg-white flex justify-between rounded-lg shadow-sm sticky top-5 items-center">
            <h1
                class="text-3xl font-semibold inline-block after:mt-1 after:block after:content-[''] after:h-2 after:bg-orenKortail">
                Antrian
            </h1>
        </div>

        <div class="flex flex-col gap-3 px-5 py-3 bg-white justify-start rounded-lg shadow-sm">
            @if(isset($data))
                @if($data)
                    <div class="grid grid-cols-5 gap-3">
                        @foreach($data as $pesanan)
                        <div class="border border-slate-300 rounded-lg px-3 py-1 flex flex-col gap-1">
                            <div class="flex justify-between text-xl font-medium">
                                <p class="">{{ $pesanan[0] }}</p>
                            </div>
                            <div class="flex flex-col text-sm">
                                @foreach ($pesanan[2] as $item)
                                <div class="flex justify-between">
                                    <p>{{ $item[0] }}</p>
                                    <div class="flex gap-1">
                                        <p>x{{ $item[1] }}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="flex justify-between font-medium">
                                <p>Total Harga</p>
                                <p>Rp {{ number_format($pesanan[1], 0) }}</p>
                            </div>
                            <form action="/antrian/{{ $pesanan[3] }}" method="POST" class="bg-orenKortail w-full border border-slate-800 rounded-lg flex justify-center">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Pesanan selesai">
                            </form>
                        </div>
                        @endforeach
                    </div>
                @else
                <p>Pesanan masih kosong</p>
                @endif
            @else
            <p>Pesanan masih kosong</p> 
            @endif
        </div>

    </main>

</div>
@endsection