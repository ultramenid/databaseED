 <div>
@if ($isAdd)
    <div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400" x-show="open" x-transition x-cloak style="display: none !important">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity">
                <div class="absolute inset-0 bg-gray-400 dark:bg-gray-900 opacity-50"></div>
            </div>

            <!-- Trick browser into centering -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

            <div class="px-4 py-6 inline-block align-bottom min-h-[450px] overflow-y-auto rounded-sm bg-white text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-96" role="dialog" aria-modal="true" aria-labelledby="modal-headline">

                <!-- Header -->
                <div class="w-full mb-4">
                    <span class="text-xl">Tambah Perkembangan Kasus</span>
                </div>

                <!-- Content -->
                <div class="flex sm:flex-row flex-col gap-6">
                    <div class="w-full">

                        <div wire:ignore>
                        <input
                            id="tanggalPerkembangan"
                            type="text"
                            class="bg-gray-100 rounded w-full border py-2 px-4 focus:outline-none text-sm"
                            placeholder="Date. . ."
                            wire:model.defer="tanggalPerkembangan"
                        />
                    </div>

                        <!-- Perkembangan -->
                        <div class="mt-2">
                            <label class="text-sm text-gray-900 mb-1">Perkembangan</label>
                            <textarea rows="5" wire:model.defer="descPerkembangan" class="bg-gray-100 text-sm rounded w-full border py-2 px-4 focus:outline-none" placeholder="Deskripsi. . ."></textarea>
                        </div>

                        <!-- Sumber (Multiple) -->
                        <div class="mt-4" x-data="{ count: 0 }">
                            <label class="text-sm text-gray-900">Sumber (Multiple)</label>
                            <div class="flex flex-col mb-2">
                                @foreach ($sumberurl as $key => $value)
                                    <span class="inline-flex justify-between mb-2 bg-black text-white rounded py-2 px-2 items-center text-sm">
                                        {{ $value }}
                                        <svg wire:click="deleteURL({{ $key }})" class="ml-1 h-4 w-4 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </span>
                                @endforeach
                            </div>

                            <input wire:keydown.enter="setsumberURL" type="text" class="bg-gray-100 text-sm text-gray-700 rounded w-full border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" wire:model.defer="url" placeholder="Url. . .">
                            <p class="italic text-xs mb-1 text-gray-400">type and enter</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Buttons -->
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse mt-6 mb-6 bottom-0 right-0 sticky">
                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                        @if ($buttonSave)
                            <button wire:loading.remove wire:click="storePerkembangan" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-black text-base leading-6 font-medium text-gray-200 shadow-sm focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Tambah
                            </button>
                        @endif
                        @if ($buttonUpdate)
                            <button wire:loading.remove wire:click="storingUpdate" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-black text-base leading-6 font-medium text-gray-200 shadow-sm focus:outline-none transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                Ubah
                            </button>
                        @endif

                    </span>
                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                        <button wire:loading.remove wire:click="closeReason" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            Close
                        </button>
                    </span>
                </div>

            </div> <!-- Modal Panel -->
        </div> <!-- Centering Wrapper -->
    </div> <!-- Modal Container -->
@endif
</div>
