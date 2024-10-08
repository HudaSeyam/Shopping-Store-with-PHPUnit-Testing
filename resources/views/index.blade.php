@extends('layouts.app')

@section('content')
<div 
    class="grid grid-cols-1 m-auto w-full h-screen bg-dunes bg-cover bg-center"
    style="background-image: url('{{ asset('storage/download.jpeg') }}');">
    <div class="flex text-gray-100">
        <div class="m-auto pb-16 sm:m-auto w-4/5 block text-center">
            <h1 class="sm:text-white text-3xl sm:text-5xl uppercase font-normal text-shadow-md">
             Welcome to Our Online Store! 🎉
            </h1>
            <p class="pb-10 font-thin pt-6">
            Explore a wide range of products carefully curated just for you! From the latest electronics to fashion must-haves, we have something for everyone.
            </p>
            <a  
                href="/shop"
                class="px-8 py-4 text-l uppercase text-white font-bold bg-blue-600 rounded-full w-full">
                Shop Now
            </a>
        </div>
    </div>
</div>
@endsection