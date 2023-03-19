<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
</head>

<body> 
    <div class="flex justify-center h-screen items-center gap-20 ml-8">
        <div class="w-72">
        <form class=" -mt-16" action="{{URL::to('dashboard2')}}">
            <h1 class="text-4xl font-semibold my-2">Selamat Datang</h1>
            <p class="text-xl font-normal my-2">Masuk ke dalam akunmu</p>
            <div class="mb-2 mt-6">
                <label for="email" class="block my-1">Email</label>
                <input type="text" id="email" name="email" class="border border-slate-400 rounded-lg w-full h-8">
            </div>
            <div class="my-2">
                <label for="kataSandi" class="block my-1">Kata Sandi</label>
                <input type="password" id="kataSandi" name="kataSandi" class="border border-slate-400 rounded-lg w-full h-8">
            </div>
            <a href="#" class="inline-block mb-2 float-right">Lupa kata sandi?</a>
            {{-- <input type="button" class="border border-black bg-orenKortail rounded-lg px-8 py-1 w-full text-xl">Masuk</button> --}}
            <a href="{{URL::to('dashboard2')}}" class="block border border-black bg-orenKortail rounded-lg px-8 py-1 w-full text-xl mt-10 text-center">Masuk</a>
        </form>
        </div>
        <div class="w-5/12 bg-black">
            <img src="{{URL::asset('img/Group 76.png')}}" alt="" class="-mt-64 w-full">
        </div>
    </div>
</body>
</html>