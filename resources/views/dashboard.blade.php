@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')

    <div class="max-w-5xl mx-auto px-6 md:px-8 sm:py-16 py-8 min-h-screen">
        <h1 class="font-bold sm:text-3xl text-2xl text-center">Database Kasus Environmental Defender Yayasan Auriga</h1>
        <p class="text-center text-green-800 font-bold text-xl">(https://environmentaldefender.id)</p>
        <div class="w-full h-96 bg-black mt-6 flex items-center justify-center">
            <p class="text-white">Peta</p>
        </div>
        <div class="flex justify-between space-x-4 mt-6 ">
            <div class="w-6/12 h-96 bg-red-500 flex items-center justify-center">
                <p>Jumlah Korban</p>
            </div>
            <div class="w-6/12 h-96 bg-yellow-500 flex items-center justify-center">
                <p>Pelaku</p>
            </div>
        </div>
        <div class="flex justify-between space-x-4 mt-6 ">
            <div class="w-6/12 h-96 bg-orange-500 flex items-center justify-center">
                <p>Gender</p>
            </div>
            <div class="w-6/12 h-96 bg-green-500 flex items-center justify-center">
                <p>Tahun</p>
            </div>
        </div>
        <div class="flex justify-between space-x-4 mt-6 ">
            <div class="w-6/12 h-96 bg-pink-500 flex items-center justify-center">
                <p>Bentuk Ancaman</p>
            </div>
            <div class="w-6/12 h-96 bg-purple-500 flex items-center justify-center">
                <p>Sektor</p>
            </div>
        </div>
        <livewire:table-database />
    </div>

    <div>
        <div class="fixed z-40 sm:bottom-10 sm:right-12 bottom-6 right-4 cursor-pointer " >
            <a href="{{url('/cms/adddatabase')}}">
                <div class="sm:px-4 px-2 sm:py-4 py-2 border border-white bg-black rounded-full bgrmi flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                  </svg>
                </div>
            </a>
        </div>
    </div>

@endsection