@extends('layouts.backend')


@section('content')
    @include('partials.backendHeader')
    <livewire:deleter-modal />
    <livewire:toastr />

    <div class="max-w-5xl mx-auto px-6 md:px-8 sm:py-16 py-8">
        <h1 class="font-bold sm:text-3xl text-2xl text-center">Database Kasus Environmental Defender Yayasan Auriga</h1>
        <p class="text-center text-green-800 font-bold text-xl">(https://environmentaldefender.id)</p>
    </div>
        <div class="max-w-5xl mx-auto px-6">
            <livewire:map-database />
        </div>
    <div class="max-w-5xl mx-auto px-6 md:px-8 ">

        <div class=" w-full border border-gray-400 mt-6">
            <livewire:tahun-component />

        </div>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-6 ">
            <div class="sm:w-6/12 w-full border border-gray-400">
                <livewire:gender-chart-component >
            </div>
            <div class="sm:w-6/12 w-full border border-gray-400 ">
            <livewire:jumlah-corban-component />

            </div>
        </div>
        <div class="flex justify-between space-x-4 mt-6 ">
            <div class="sm:w-6/12 w-full border border-gray-400 ">
                <livewire:bentuk-ancaman-component >
            </div>
            <div class="sm:w-6/12 w-full border border-gray-400 ">
                <livewire:sektor-component />
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
