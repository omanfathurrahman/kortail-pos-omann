@extends('kasir.layouts.main')

@section('container')

<main class="flex flex-col w-full p-5 bg-greyBgMain gap-2">

    <div class="px-5 py-3 bg-white flex justify-start rounded-lg shadow-sm">
        <h1 class="text-3xl font-semibold inline-block after:mt-1 after:block after:content-[''] after:h-2 after:bg-orenKortail">
            Pembayaran
        </h1>
    </div>

    <div class="flex gap-5 px-5 py-3 bg-white rounded-lg">
        <div class="flex flex-col gap-3 bg-white border p-3 rounded-lg w-full">
            <div class=" flex flex-col gap-1">

                <h2 class="font-medium text-lg">Pesanan</h2>
                <p>Pastikan lagi pesanan sudah benar agar tidak terjadi kesalahan</p>

                <div class="flex flex-col gap-1 p-1 border border-slate-200 rounded-lg">
                    @foreach ($produkDipilih as $id=>$value)
                    <div class="flex items-center gap-2  rounded-lg p-1">
                        <div class="flex flex-col">
                            <h3 class="font-medium">{{ $value[1] }}</h3>
                            <div class="flex gap-1">
                                <p>Rp <?php echo number_format($value[2], 0) ?></p>
                                <p>x {{ $value[0] }}</p>
                                <p>=</p>
                                <p>Rp <?php echo number_format($value[0]*$value[2], 0) ?></p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="bg-white p-3 border border-slate rounded-lg w-5/12">
            <div class="">
                <h2 class="font-medium text-lg">Total</h2>
                <div class="">
                    <div class="flex justify-between">
                        <p>Subtotal:</p>
                        <p>Rp <?php echo number_format($subtotal, 0) ?></p>
                    </div>
                    <div class="flex justify-between">
                        <p>Diskon:</p>
                        @if($jumlahDiskon != 0)
                            <p>{{$diskon}} ({{ $persenDiskon }}) | Rp {{ number_format($jumlahDiskon, 0) }}</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="flex justify-between">
                        <p>Potongan:</p>
                        @if($potongan != 0)
                            <p>Rp {{ number_format($potongan, 0) }}</p>
                        @else
                            <p>-</p>
                        @endif
                    </div>
                    <div class="flex justify-between font-medium">
                        <p>Total:</p>
                        <p>Rp {{ number_format($total, 0) }}</p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-1 mt-1">

                <h2 class="font-medium text-lg">Metode Pembayaran</h2>
                <div class="flex flex-col gap-1">

                    <form action="{{URL::to('transaksi/pembayaran/checkOut')}}" method="POST">
                        @csrf
                        <input type="hidden" name="cusName" value="{{ $cusName }}">
                        <input type="hidden" name="noAntrian" value="{{ $noAntrian }}">
                        <input type="hidden" id="produkDipilih1" name="produkDipilih" value="">
                        <input type="hidden" name="total" value="{{ $total }}">
                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                        <input type="hidden" name="diskon" value="{{ $diskon }}">
                        <input type="hidden" name="persenDiskon" value="{{ $persenDiskon }}">
                        <input type="hidden" name="jumlahDiskon" value="{{ $jumlahDiskon }}">
                        <input type="hidden" name="potongan" value="{{ $potongan }}">
                        
                        {{-- <input type="hidden" name="metodePembayaran" value="Tunai"> --}}
                        <div class="flex flex-col gap-1">
                            <input 
                                type="submit" 
                                name="metodePembayaran"
                                value="Tunai"
                                class="block w-full justify-center border border-slate-300 py-1 rounded-lg bg-green-200">
                            <input 
                                type="submit" 
                                name="metodePembayaran"
                                value="QRIS" 
                                class="block w-full justify-center border border-slate-300 py-1 rounded-lg bg-orange-200">
                        </div>
                        
                    </form>

                    {{-- <form action="{{URL::to('transaksi/pembayaran/checkOut')}}" method="POST">
                        @csrf
                        <input type="hidden" name="cusName" value="{{ $cusName }}">
                        <input type="hidden" name="noAntrian" value="{{ $noAntrian }}">
                        <input type="hidden" id="produkDipilih2" name="produkdipilih" value="">
                        <input type="hidden" name="total" value="{{ $total }}">
                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                        <input type="hidden" name="diskon" value="{{ $diskon }}">
                        <input type="hidden" name="persenDiskon" value="{{ $persenDiskon }}">
                        <input type="hidden" name="jumlahDiskon" value="{{ $jumlahDiskon }}">
                        <input type="hidden" name="potongan" value="{{ $potongan }}">

                        <input type="hidden" name="metodePembayaran" value="QRIS">
                        <input type="submit" value="QRIS" class="block w-full justify-center border border-slate-300 py-1 rounded-lg bg-orange-200">
                    </form> --}}
                    
                </div>
            </div>

        </div>
    </div>
</main>

<script>
var produkDipilihJs = <?php echo $produkDipilihJs; ?>;
console.log(produkDipilihJs);

document.getElementById('produkDipilih1').value = JSON.stringify(produkDipilihJs)
document.getElementById('produkDipilih2').value = JSON.stringify(produkDipilihJs)
console.log(document.getElementById('produkDipilih2').value);

</script>
@endsection