@extends('kasir.layouts.main')

@section('container')

<main class="flex flex-col w-full p-5 bg-greyBgMain gap-2">
    <div class="px-5 py-3 bg-white rounded-lg shadow-sm flex justify-center">
        <div 
            id="divToPrint"
            class="border border-slate-300 w-96 rounded-lg px-6 py-4 flex flex-col gap-1">
            <h2 class="font-medium text-lg text-center">Rangkuman Transaksi</h2>
            <table>
                <tr>
                    <td>Nama Pemesan</td>
                <td class="text-right">{{ $cusName }}</td>
                </tr>
                <tr>
                    <td>Waktu pemesanan</td>
                    <?php date_default_timezone_set("Asia/Jakarta"); ?>
                    <td class="text-right"><?= date("H:i, d-m-Y") ?></td>
                </tr>
                <tr>
                    <td>No Pesanan</td>
                    <td class="text-right"> {{ $noPesanan+1 }}</td>
                </tr>
                {{-- <tr>
                    <td>No Antrian</td>
                    <td class="text-right">{{ $_GET['noAntrian'] }}</td>
                </tr> --}}
                <tr>
                    <td>Metode Pembayaran</td>
                    <td class="text-right">{{ $metodePembayaran }}</td>
                </tr>
            </table>

            <div class="h-px bg-slate-300">
            </div>

            <table class="border-separate border-spacing-y-1">
                @foreach ($produkDipilih as $i=>$j)
                <tr>
                    <td>{{ $j[1] }}</td>
                    <td class="text-right">x {{ $j[0] }}</td>
                    <td class="text-right">Rp {{ number_format($j[0]*$j[2], 0) }}</td>
                </tr>
                @endforeach
            </table>

            <div class="h-px bg-slate-300">
            </div>

            <table>
                <tr>
                    <td>Subtotal</td>
                    <td class="text-right">Rp {{ number_format($subtotal,0) }}</td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    @if($jumlahDiskon != 0)
                        <td class="text-right">{{$diskon}} ({{ $persenDiskon }}) | Rp {{ number_format($jumlahDiskon, 0) }}</td>
                    @else
                        <td class="text-right">-</td>
                    @endif
                </tr>
                <tr>
                    <td>Potongan</td>
                    @if($potongan != 0)
                        <td class="text-right">Rp {{ number_format($potongan, 0) }}</td>
                    @else
                        <td class="text-right">-</td>
                    @endif
                </tr>
                <tr class="font-semibold">
                    <td>Total</td>
                    <td class="text-right">Rp {{ number_format($total,0) }}</td>
                </tr>
            </table>

            <div 
                id="gaDiprint"
                class="flex flex-col gap-1">
                <button 
                    onclick="printDiv()"
                    type="button"
                    class="text-md bg-yellow-200 py-1 rounded-lg font-normal border border-slate-300 flex justify-center w-full">
                    <p>
                        Cetak struk
                    </p>
                </button>
                <form action="{{ URL::to('/antrian') }}" method="POST" class="text-md bg-yellow-200 py-1 rounded-lg font-normal border border-slate-300 flex justify-center">
                    @csrf
                    <input type="hidden" name="pesanan" value="{{ $noPesanan }}">
                    <input type="submit" value="Masukkan ke keranjang">
                </form>
                <a href="{{URL::to('transaksi')}}" class="text-md bg-green-200 py-1 rounded-lg font-normal border border-slate-300 flex justify-center">
                    <p>
                        Selesai
                    </p>
                </a>
            </div>
        </div>
    </div>

</main>

<script>
function printDiv() {
   var divToPrint = document.getElementById("divToPrint");
   var gaDiprint = document.getElementById("gaDiprint");
   var allElements = document.getElementsByTagName("body")[0];
   allElements.style.visibility = "hidden";
   gaDiprint.style.visibility = "hidden";
   divToPrint.style.visibility = "visible";
   window.print();
   allElements.style.visibility = "visible";
   gaDiprint.style.visibility = "visible";
}
</script>
@endsection