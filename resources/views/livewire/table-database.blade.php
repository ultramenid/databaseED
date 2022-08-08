<div>

<div class="flex sm:flex-row flex-col sm:space-y-0 space-y-4 justify-between px-4 py-4 mt-12 items-center">
    <div class="px-2 bg-black py-2 text-white cursor-pointer" wire:loading.remove wire:click="exportExcel">Export Excel</div>
    <button wire:loading wire:target='exportExcel' type="button" class="px-2 bg-black py-2 text-white cursor-not-allowed w-24">
        <svg class="animate-spin mx-auto h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </button>
    <input class="sm:w-52 w-full mb-4 py-2 border-gray-500 border px-2 focus:outline-none" wire:model='search'>
</div>
<table class="w-full divide-y divide-gray-200  rounded-lg   border border-gray-100">
    <thead class="">
        <tr >
            <th wire:click='sortingField("tanggalkejadian")' class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-3/12 w-11/12">
               <div class="flex space-x-1">
                   <a>Tanggal Kejadian</a>
                   <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                    </svg>
                </div>
            </th>
            <th wire:click='sortingField("kasus")' class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-3/12 w-11/12">
                <div class="flex space-x-1">
                    <a>Kasus</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                     </svg>
                 </div>
             </th>
             <th wire:click='sortingField("kronologi")' class="bg-gray-50 px-6 py-4   text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer sm:w-5/12 w-11/12">
                <div class=" space-x-1 hidden sm:flex" >
                    <a >Kronologi</a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 my-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                     </svg>
                 </div>
             </th>

            <th class=" text-right bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider w-1/12">

            </th>
        </tr>
    </thead>
    <tbody class="bg-white  divide-y divide-gray-200 ">
        @forelse ($databases as $item)
        <tr>
            <td class="px-6 py-4 break-words text-sm font-bold text-newgray-700 ">
                <a>{{ \Carbon\Carbon::parse($item->tanggalkejadian)->format('d M Y')}}</a>
            </td>
            <td class="px-6 py-4 break-words text-sm font-bold text-newgray-700 ">
                <a href="{{ url('/cms/editdatabase/'.$item->id) }}">{{ $item->kasus }}</a>
            </td>
            <td class="px-6 py-4 break-words text-sm font-bold text-newgray-700 sm:block hidden">
                <a >{{ substr($item->kronologi,0,140).'...'  }}</a>
            </td>


            <td colspan="2" class=" break-words text-sm text-gray-500  px-6">
                <div class="relative flex justify-end" x-data="{ open: false }">

                    <button class=" focus:outline-none" @click="open = true">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                        </svg>
                    </button>

                    <ul
                        class="absolute mt-6  right-0 bg-white rounded-lg shadow-lg block w-24 z-10"
                        x-show.transition="open"
                        @click.away="open = false"
                        x-cloak style="display: none !important">
                        <a data-turbolinks="false" href="{{ url('/cms/editdatabase/'.$item->id) }}"><li class="block hover:bg-gray-200 cursor-pointer py-1 mt-2 px-4 " @click.away="open = false">Edit</li></a>
                        <li class="block hover:bg-gray-200 cursor-pointer  py-1 mb-2 px-4 "  wire:click="delete({{ $item->id }})" @click.away="open = false">Delete</li>
                    </ul>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5" class="whitespace-nowrap text-sm text-gray-500 px-6 py-3">
                No data found
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@if ($databases)
{{ $databases->links('livewire.pagination') }}
@endif
</div>
