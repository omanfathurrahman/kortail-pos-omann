<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container mx-auto mt-6 max-w-sm">

        <div class="bg-slate-300 py-1 px-3">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mx-auto">Logout</button>
        </div>

        <h1 class="text-5xl mb-4">Alpine.js Demo</h1>

        <!-- x-data alpine component -->
        <div 
        x-data="{
            open:false, 
            name: 'Brad', 
            search:'123',
            posts:[
                {title: 'post one'},
                {title: 'post two'},
                {title: 'post three'},
                {title: 'post four'}
            ]
        }">

            <!-- x-on & x-bind -->
            <button 
            x-on:click="open = !open" 
            x-bin:class="open ?  'bg-blue-800' : 'bg-slate-700' "
            class=" text-white px-4 py-2 rounded-xl bg-slate-300">
            Toggle
            </button>

            <!-- x-show -->
            <div x-show="open" x-transition x-cloak>
                <p class="bg-gray-200 p-4 my-6 rounded">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae sit non, totam eligendi a esse nesciunt consequuntur voluptatum cupiditate mollitia.
                </p>
            </div>

            <!-- x-text -->
            <div class="my-4">
                The value of name is <span x-text="name" class="font-bold"></span>
            </div>

            <!-- x-effect -->
            <div x-effect=" console.log(open) "></div>
            
            <!-- x-model -->
            <input 
            x-model="search"
            type="text" 
            class="border p-2 w-full mb-2 mt-6" 
            placeholder="Search for something..."
            >
            <p>
                <span class="font-bold">Searching for:</span>
                <span x-text="search"></span>
            </p>

            <!-- x-if -->
            <template x-if="open">
                <div class="bg-gray-50 p-2 mt-6">
                    Template based on condition
                </div>

                <!-- x-for -->
            </template>

            <h3 class="text-2xl mt-6 mb-3 font-bold">Posts</h3>
            <template x-for="post in posts">
                <div x-text="post.title"></div>
            </template>

            <button @click="posts.push({title: 'title post'})" class="bg-blue-800 text-white px-4 py-2 rounded-lg mt-4">
            Add Post
            </button>

            <div class="my-6">
                <!-- x-ref -->
                <div x-ref=" text "></div>
    
                <button class="bg-black text-white p-2 rounded-lg">
                    Click
                </button>
            </div>

        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                     <i class="fa fa-sign-out"></i>{{ __('Logout') }}
             </x-jet-dropdown-link>
        </form>
    </div>
</body>
</html>