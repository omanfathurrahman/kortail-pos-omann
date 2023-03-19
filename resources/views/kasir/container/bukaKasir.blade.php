@extends('kasir.layouts.main')

@section('container')
<main class="w-full bg-greyBgMain p-5 flex flex-col gap-2">
    <div class="px-5 py-3 bg-white flex justify-start rounded-lg shadow-sm">
        <h1 class="text-3xl font-semibold inline-block after:mt-1 after:block after:content-[''] after:h-2 after:bg-orenKortail ">
            Tunai {{ ($status == 'tutup') ? 'Awal' : 'Akhir' }}
        </h1>
    </div>
    <div class="px-5 py-3 bg-white rounded-lg shadow-sm">
        <div class="flex justify-between border border-slate-300 items-end rounded-lg h-max w-1/3">
            <div class="flex flex-col gap-2 px-5 py-3 w-full">
                <h2 class="text-3xl">Tunai {{ ($status == 'tutup') ? 'Awal' : 'Akhir' }} di Kasir</h2>
                {{-- <p>Masukkan total tunai yang ada di kasir</p> --}}
                <form class="flex flex-col gap-1" action="{{ URL::to( ($status == 'tutup') ? '/home' : '/home/'.$rowId ) }}" method="POST">
                    @csrf
                    @if ($status == 'buka')
                        @method('PATCH')
                    @endif
                    <div class="w-full">
                        <label for="tunaiAwal">Tunai {{ strtolower(($status == 'tutup') ? 'Awal' : 'Akhir') }} (dalam rupiah):</label>
                        <input type="text" name="tunaiAwal" class="w-full h-8 rounded-lg border border-slate-300" required>
                    </div>
                    <div class="">
                        @if ($status == 'tutup')
                        <label for="shiftKasir">Shift:</label>
                        @endif
                        <div class="flex gap-5 w-full">
                            @if ($status == 'buka')
                            <select class="block py-0.5 px-10 border border-slate-300 rounded-lg w-full" name="shiftKasir" required>
                                <option value="pilihDiskon" selected>Pilih Shift</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            @endif
                            <input type="submit" value="{{ ($status == 'tutup') ? 'Buka' : 'Tutup' }}" class="block bg-orenKortail px-14 rounded-lg border border-slate-300">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

@endsection