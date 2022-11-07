<header class="max-w-5xl px-4 mx-auto pt-4 flex items-center justify-between">
    <div class="flex items-center space-x-4">
       <div class="">
            <a href="{{ url('/cms/dashboard') }}"><span class="font-semibold text-2xl tracking-tight text-newgray-900  ">Environmental Defender</span></a>
       </div>
    </div>

    {{-- // responsive pc--}}
    <div class=" flex">
        @include('partials.toogleProfile')
    </div>
 </header>
