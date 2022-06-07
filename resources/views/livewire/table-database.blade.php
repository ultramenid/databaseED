<div>
<div class="flex justify-end">
    <input class="sm:w-52 w-full mt-6 mb-4 py-2 border-gray-500 border px-2 focus:outline-none" wire:model='search'>
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
                <div class="flex space-x-1">
                    <a>Kronologi</a>
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
                <a href="{{ url('/cms/database/'.$item->id) }}">{{ $item->kasus }}</a>
            </td>
            <td class="px-6 py-4 break-words text-sm font-bold text-newgray-700 ">
                <a >{{ $item->kronologi }}</a>
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
                        <a data-turbolinks="false" href="{{ url('/cms/database/'.$item->id) }}"><li class="block hover:bg-gray-200 cursor-pointer py-1 mt-2 px-4 " @click.away="open = false">Edit</li></a>
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
</div>
