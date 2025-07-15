<div class="mt-4 border px-4 py-4">
    <div x-data="{ open: @entangle('deleter') }">
        @include('partials.deleterModal')
    </div>

    <div x-data="{ open: @entangle('isAdd') }">
       @include('partials.addPerkambangan')
    </div>

    <div class="flex justify-between">
        <div class="flex gap-4">
            <h1 class="text-xl text-gray-900 mb-1">Tabel Perkembangan</h1>
            <a wire:click='addPerkembangan' class="cursor-pointer inline-flex px-4 py-1 rounded dark:hover:bg-newgray-900 dark:hover:border-gray-200 dark:hover:text-gray-200 hover:bg-white hover:text-newgray-900 border hover:border-newgray-900 bg-newgray-900 dark:bg-gray-100 text-newgray-100 dark:text-newgray-900">
                Add
            </a>
        </div>
    </div>

    <div class="flex flex-col py-5">
        <div class="-my-2 sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                <div class="shadow border-b border-gray-200 dark:border-gray-800 sm:rounded-lg dark:bg-opacity-10 dark:text-white">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-800 rounded-lg">
                        <thead>
                            <tr>
                                <th class="px-6 py-4 bg-black dark:bg-opacity-10 text-white text-left text-xs font-medium uppercase tracking-wider cursor-pointer sm:w-2/12 w-11/12">
                                    <div class="flex space-x-1">
                                        <a>Tahun</a>
                                    </div>
                                </th>
                                <th class="py-3 bg-black dark:bg-opacity-10 text-white text-left text-xs font-medium uppercase tracking-wider sm:w-4/12 w-0">
                                    <a class="hidden sm:block">Perkembangan</a>
                                </th>

                                <th class="text-right bg-black dark:bg-opacity-10 text-white text-xs font-medium uppercase tracking-wider w-1/12">
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-100 dark:bg-opacity-20 dark:text-white divide-y divide-gray-200 dark:divide-gray-900">
                            @forelse ($posts as $item)
                                <tr>
                                    <td class="px-6 py-2 break-words text-sm font-bold text-newgray-700 dark:text-gray-300">
                                        {{ $item->waktu }}
                                    </td>
                                    <td class="py-2 break-words text-sm text-left text-newgray-700 dark:text-gray-300">
                                        {{ $item->perkembangankasus }}
                                    </td>
                                    <td colspan="2" class="break-words text-sm text-gray-500 dark:text-gray-300 px-6">
                                        <div class="relative flex justify-end" x-data="{ open: false }">
                                            <button class="focus:outline-none" @click="open = true">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                                </svg>
                                            </button>

                                            <ul
                                                class="absolute mt-6 right-0 bg-white rounded-lg shadow-lg block w-24 z-10"
                                                x-show.transition="open"
                                                @click.away="open = false"
                                                x-cloak style="display: none !important">
                                                <a>
                                                    <li wire:click='editPerkembangan' class="block hover:bg-gray-200 cursor-pointer py-1 mt-2 px-4 dark:text-gray-500" @click.away="open = false">
                                                        Edit
                                                    </li>
                                                </a>
                                                <li class="block hover:bg-gray-200 cursor-pointer py-1 mb-2 px-4 dark:text-gray-500" wire:click="delete({{ $item->id }})" @click.away="open = false">
                                                    Delete
                                                </li>
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
                </div> <!-- /.shadow -->
            </div> <!-- /.py-2 -->
        </div> <!-- /.-my-2 -->
    </div> <!-- /.flex -->
    <script>
    document.addEventListener("livewire:load", () => {
        Livewire.hook('message.processed', (message, component) => {
            const el = document.getElementById('tanggalPerkembangan');
            if (el && !el._flatpickr) {
                flatpickr(el, {
                    enableTime: false,
                    dateFormat: 'Y-m-d',
                    disableMobile: true
                });
            }
        });
    });
</script>
</div> <!-- /.mt-4 -->
