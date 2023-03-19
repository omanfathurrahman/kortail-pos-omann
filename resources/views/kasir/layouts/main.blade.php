<?php
$pages = array('Home', 'Transaksi','Produk','Antrian');

use Illuminate\Support\Facades\Auth;
?>

<!doctype html>
<html class="font-['Open_Sans']">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>{{ $page }}</title>
    <script src="//unpkg.com/alpinejs" defer></script>
    <style>
        [x-cloak]{
            display: none;
        }
    </style>
</head>

<body>

    <div class="flex" x-data="{open:false}">
        <aside class="flex flex-col justify-between h-screen w-28 items-center py-6 sticky top-0">

            <form 
                x-show="open" 
                x-cloak 
                x-on:click.outside="open = false"
                method="POST" 
                action="{{ route('logout') }}" 
                class="w-40 bg-white py-1 px-3 absolute z-10 bottom-28 left-10 drop-shadow-2xl border border-slate-200 rounded-md"
                >
                @csrf
                <h3 class="mb-2 py-1 px-3">Keluar dari akun</h3>
                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                         <i class="fa fa-sign-out"></i>{{ __('Logout') }}
                 </x-jet-dropdown-link>
            </form>

            <div class="flex flex-col gap-6">
                <div class="m-2">
                    <img src="{{ URL::asset('img/logo-kortail.png') }}" alt="">
                </div>
                
                <div class="flex flex-col items-center gap-3">

                    @foreach ($pages as $i)
                    <div class="w-full flex justify-center">
                        <a href="{{ URL::to(strtolower($i)) }}">
                            <div class="w-16 flex flex-col items-center justify-center py-4 rounded-lg {{ ($i == $page) ? 'bg-orenKortailBgButton' : '' }} ">
                                <img src="{{ URL::asset(($i == $page) ? 'img/'.strtolower($i).'-clicked.png' : 'img/'.strtolower($i).'.png') }}" alt="" class="mx-auto w-6">
                                <p class="text-xs {{ ($i == $page) ? 'text-orenKortailDark' : '' }}">
                                    {{ $i }}
                                </p>
                            </div>
                        </a>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="px-4" x-on:click="open = !open" >
                <img src="{{ URL::asset('img/avatar.png') }}" alt="">
                <p>
                    {{ Auth::user()->name }}
                </p>
            </div>
        </aside>

        {{-- MAIN CUYY --}}
        @yield('container')

        

    </div>
</body>

</html>