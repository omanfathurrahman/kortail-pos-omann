<!doctype html>
<html class="font-['Open_Sans']">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center h-screen items-center"> 
    <div class="flex justify-center gap-20 ml-12 items-center">
        
        <div class="flex flex-col gap-6">
            <div class="">

                <div class="w-24 mb-3">
                    <img src="{{ URL::asset("/img/logo-kortail.png") }}" alt="">
                </div>
                <div class="">
                    <h1 class="text-6xl font-medium">Koral Retail</h1>
                    <h2 class="text-4xl font-medium">Point of Sale</h2>
                </div>
            </div>
            {{-- <button type="button" class="
            text-2xl px-6 py-1 bg-orenKortail rounded-lg
            border border-black my-2 w-3/4
            " formaction="http://127.0.0.1:8000/login"><p class="">Masuk</p></button> --}}
            <div class="flex flex-col gap-1">
                <p>Tekan masuk untuk melanjutkan</p>
                <a href="{{URL::to('login')}}" class="" formaction="{{URL::to('login')}}">
                    <div class="bg-orenKortail flex justify-center py-1 rounded-lg border border-slate-800 w-72 font-semibold">
                        Masuk
                    </div>
                </a>
            </div>
        </div>
        <div class="">
            <img src="{{URL::asset('/img/image 4.png')}}" alt="" class="w-[36rem]">
        </div>
    </div>
</body>
</html>