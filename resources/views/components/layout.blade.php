<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="/images/Screenshot_2023-08-14_144324-removebg-preview.png">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<style>
    html{
        scroll-behavior:smooth;
    }
</style>

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/Screenshot_2023-08-14_144324-removebg-preview.png" alt="" width="100" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">

{{--            @if(! auth()->check())--}}
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                <button href="/register" class="text-xs font-bold uppercase">Welcome,{{auth()->user()->name}}!</button>
                    </x-slot>
                    <x-dropdown-item
                        href="/admin/posts"
                        :active="request()->is('admin/posts')"
                    >
                        Dashboard
                    </x-dropdown-item>

                    <x-dropdown-item
                        href="/admin/posts/create"
                        :active="request()->is('admin/posts/create')"
                    >
                        New Post
                    </x-dropdown-item>

                    <x-dropdown-item
                        href="#"
                        x-data="{}"
                        @click.prevent="document.querySelector('#logout-form').submit()"
                    >
                        Log Out
                    </x-dropdown-item>

                    <form id="logout-form" method="POST" action="/logout" class="hidden">
                        @csrf
                    </form>
                </x-dropdown>

{{--                <a href="/logout" class="ml-6 text-xs font-bold uppercase">--}}
{{--            <form method="POST" action="/logout" class="inline">--}}
{{--                @csrf--}}
{{--                <button type="submit" class=" text-xs font-bold uppercase text-red-500">Log Out</button>--}}
{{--            </form>--}}
{{--                </a>--}}
{{--            @endif--}}
            @else
                <a href="/register" class="text-xs font-bold uppercase">Register</a>
                <a href="/login" class="ml-6 text-xs font-bold uppercase text-blue-500">Log In</a>

            @endauth

            <a href="#newsletter" class="bg-pink-400 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                Subscribe for Updates
            </a>
        </div>
    </nav>

    {{$slot}}

    <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16"
    >
        <img src="/images/Screenshot_2023-08-14_144324-removebg-preview.png" alt="" class="mx-auto -mb-15" style="width: 145px;">

        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf

                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email" class="hidden lg:inline-block">
                            <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                        </label>

                        <div>
                            <input id="email"
                                   name="email"
                                   type="text"
                                   placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                            @error('email')
                            <span class="text-xs text-red-500">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-pink-400 hover:bg-pink-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
</section>
{{--error--}}
{{--@if (session()->has('success'))--}}
{{--    <div x-data="{ show: true}"--}}
{{--         x-init="setTimeout(()=> show = false, 4000)"--}}
{{--         x-show=""--}}
{{--        class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm"--}}
{{--    >--}}
{{--        <p>{{session('success')->get('success')}}</p>--}}
{{--    </div>--}}
{{--@endif--}}
</body>
