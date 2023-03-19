<!doctype html>
<html class="font-['Open_Sans']">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body>
<div class="px-5 py-3 rounded-lg flex justify-center">
    <div class="border w-96 rounded-lg px-6 py-4 flex flex-col gap-1">
        <h2 class="font-medium text-lg text-center">Struk Belanja</h2>
        <table>
            <tr>
                <td>Nama Pemesan</td>
                <td class="text-right">Asep</td>
            </tr>
            <tr>
                <td>Waktu pemesanan</td>
                <td class="text-right">13:30, 11-10-2022</td>
            </tr>
            <tr>
                <td>No Pesanan</td>
                <td class="text-right">312</td>
            </tr>
            <tr>
                <td>No Antrian</td>
                <td class="text-right">18</td>
            </tr>
            <tr>
                <td>Metode Pembayaran</td>
                <td class="text-right">Tunai</td>
            </tr>
        </table>

        <div class="h-px bg-slate-300">
        </div>

        <table class="border-separate border-spacing-y-1">
            <tr>
                <td>Mojito</td>
                <td class="text-right">x 1</td>
                <td class="text-right">Rp 8.000</td>
            </tr>
            <tr>
                <td>Bento 9</td>
                <td class="text-right">x 1</td>
                <td class="text-right">Rp 18.000</td>
            </tr>
            <tr>
                <td>UMKM - Sale Pisang</td>
                <td class="text-right">x 2</td>
                <td class="text-right">Rp 30.000</td>
            </tr>
            <tr>
                <td>Beng - beng</td>
                <td class="text-right">x 2</td>
                <td class="text-right">Rp 5.000</td>
            </tr>
        </table>

        <div class="h-px bg-slate-300">
        </div>

        <table>
            <tr>
                <td>Subtotal</td>
                <td class="text-right">Rp 61.000</td>
            </tr>
            <tr>
                <td>Potongan</td>
                <td class="text-right">Rp 5.000</td>
            </tr>
            <tr class="font-semibold">
                <td>Total</td>
                <td class="text-right">Rp 56.000</td>
            </tr>
        </table>
    </div>

</body>

</html>