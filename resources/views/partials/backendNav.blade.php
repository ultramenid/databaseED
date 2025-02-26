<div class="border-b border-gray-300 sticky top-0 z-40 bg-white ">
    <div class="max-w-5xl mx-auto px-4"  x-data="{ pages: false }">
        <nav class=" flex space-x-6 text-sm leading-5 overflow-x-auto scrollbar-hide">
            <div class="whitespace-nowrap  flex flex-nowrap   py-3 rounded w-full @if($nav == 'kasus' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/dashboard')}}" class=" px-0.5  @if($nav == 'kasus' )   text-black  @endif    cursor-pointer" >Database Kasus</a>
            </div>

            <div class="whitespace-nowrap  flex flex-nowrap   py-3 rounded w-full @if($nav == 'ahli' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/dbahli')}}" class=" px-0.5  @if($nav == 'ahli' )   text-black  @endif    cursor-pointer" >Database Ahli</a>
            </div>

            <div class="whitespace-nowrap  flex flex-nowrap   py-3 rounded w-full @if($nav == 'sda' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/dbsda')}}" class=" px-0.5  @if($nav == 'sda' )   text-black  @endif    cursor-pointer" >Database Kasus SDA</a>
            </div>

            <div class="whitespace-nowrap  flex flex-nowrap   py-3 rounded w-full @if($nav == 'gugatanperdata' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/gugatanperdata')}}" class=" px-0.5  @if($nav == 'gugatanperdata' )   text-black  @endif    cursor-pointer" >Database Gugatan Perdata</a>
            </div>
            <div class="whitespace-nowrap  flex flex-nowrap   py-3 rounded w-full @if($nav == 'putusansatwa' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/putusansatwa')}}" class=" px-0.5  @if($nav == 'putusansatwa' )   text-black  @endif    cursor-pointer" >Database Putusan Satwa</a>
            </div>
        </nav>
    </div>
</div>


