<div x-data="{filter: @entangle('isFilter')}">
    <div class="fixed z-20  @if(session('role_id') > 0) sm:bottom-10 sm:right-12 @else sm:bottom-28 bottom-20  @endif   sm:right-12  right-4 cursor-pointer " wire:click='setToogle'>
        <a>
            <div class="sm:px-4 px-2 sm:py-4 py-2 border border-white bg-black rounded-full  flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z" />
                  </svg>
            </div>
        </a>
    </div>
    <div class="fixed z-40 inset-0 overflow-y-auto ease-out duration-400"  x-show="filter" x-transition x-cloak style="display: none !important">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" @click="filter=false">
                <div class="absolute inset-0 bg-gray-100  opacity-50"></div>
            </div>
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​

            <div class="inline-block align-bottom bg-black  rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full " role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                <div class="py-6 px-6" wire:ignore x-init="flatpickr('#start', { enableTime: false,dateFormat: 'Y-m-d', disableMobile: 'true'}), flatpickr('#end', { enableTime: false,dateFormat: 'Y-m-d', disableMobile: 'true'});">
                    <h1 class="text-white text-center text-2xl py-6">Filter Database</h1>
                        <div class=" mt-6 flex sm:flex-row flex-col justif-between sm:items-center sm:space-x-4 space-x-0 sm:space-y-0 space-y-2  w-full">
                            <div>
                                <label class="text-white" for="start">Dari Tanggal:</label>
                                <input id="start" type="text" class="bg-white  text-black rounded w-full border  py-2 px-4 focus:outline-none border-black "  wire:model='start' placeholder="Dari. . .">
                            </div>
                            <div>
                                <label class="text-white" for="start">Sampai Tanggal:</label>
                                <input id="end" type="text" class="bg-white  text-black rounded w-full border  py-2 px-4 focus:outline-none border-black "  wire:model='end' placeholder="Sampai. . .">
                            </div>
                        </div>
                </div>
                <div class="flex justify-end py-6 px-6">
                    <div class="sm:w-5/12 w-full flex justify-between space-x-1 ">
                        <button class="px-4 py-2 w-full bg-white rounded hover:bg-black hover:text-white hover:border-white border" wire:click="emitFilter">Submit</button>
                        <button class="px-4 py-2 w-full bg-black rounded text-red-500  border" @click="filter=false">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
