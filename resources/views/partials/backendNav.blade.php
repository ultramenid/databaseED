<div class="border-b border-gray-300 sticky top-0 z-40 bg-white ">
    <div class="max-w-5xl mx-auto px-4"  x-data="{ pages: false }">
        <nav class=" flex space-x-6 sm:justify-start justify-center text-sm leading-5 overflow-x-auto flex-wrap scrollbar-hide text-gray-500">
            <div class="hover:bg-gray-200  hover:px-2 py-3 rounded @if($nav == 'kasus' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/dashboard')}}" class=" px-0.5  @if($nav == 'kasus' )   text-black  @endif    cursor-pointer" >Database Kasus</a>
            </div>

            <div class="hover:bg-gray-200  hover:px-2 py-3 rounded @if($nav == 'ahli' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/dbahli')}}" class=" px-0.5  @if($nav == 'ahli' )   text-black  @endif    cursor-pointer" >Database Ahli</a>
            </div>

            <div class="hover:bg-gray-200  hover:px-2 py-3 rounded @if($nav == 'sda' )border-b-2   border-newgray-900 @endif ">
                <a href="{{url('/cms/dbsda')}}" class=" px-0.5  @if($nav == 'sda' )   text-black  @endif    cursor-pointer" >Database Kasus SDA</a>
            </div>

        </nav>
    </div>
</div>
