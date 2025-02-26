<div class="max-w-5xl mx-auto py-12 px-4">
    <livewire:toastr />
    <h1 class="font-bold sm:text-5xl text-4xl py-12">Edit database Ahli</h1>

    <div class="">
        <h1 class="text-xl   text-gray-900  mb-1">Kriteria Ahli</h1>
        <label class="w-full"  >
            <select wire:ignore wire:model='kriteriaahli' class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">. . .</option>
                <option value="Auditor BPK">Auditor BPK</option>
                <option value="Auditor BPKP">Auditor BPKP</option>
                <option value="Profesional">Profesional</option>
                <option value="Akademisi">Akademisi</option>
                <option value="Jurnalis">Jurnalis</option>
                <option value="NGO">NGO</option>

            </select>
        </label>
    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Nama</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='nama' placeholder="Nama. . . ">
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Gelar</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='gelar' placeholder="Gelar. . . ">
        </div>

    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-6">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Jabatan</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='jabatan' placeholder="Jabatan. . . ">
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Afliasi</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='afliasi' placeholder="Afliasi. . . ">
        </div>

    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-6">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Telp</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='telp' placeholder="Telp. . . ">
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Email</h1>
            <input  type="email" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='email' placeholder="Email. . . ">
        </div>

    </div>

    <div class="mt-6" x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Publikasi</h1>
        <textarea   rows="5"  wire:model.defer='publikasi' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Publikasi. . ."></textarea>

    </div>

    <div class=" mt-6">
        <h1 class="text-xl   text-gray-900  mb-1">Sitasi</h1>
        <input  type="number" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='stasi' placeholder="0 ">
    </div>

    <div class="mt-6">
        <h1 class="text-xl   text-gray-900  mb-1">Keahlian</h1>
        @if ($isKeahlian)
        <label class="w-full"  >
            <select  wire:model='keahlian' class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">. . .</option>
                <option value="custom">Custom Keahlian</option>
                <option value="Hukum Tambang">Hukum Tambang</option>
                <option value="Hukum Energi">Hukum Energi</option>
                <option value="Hukum Kelautan">Hukum Kelautan</option>
                <option value="Hukum Internasional">Hukum Internasional</option>
                <option value="Hukum Pidana">Hukum Pidana</option>
                <option value="Hukum Perdata dan Bisnis">Hukum Perdata dan Bisnis</option>
                <option value="Korporasi">Korporasi</option>
                <option value="Energi">Energi</option>
                <option value="Kehutanan">Kehutanan</option>
                <option value="Valuasi Ekonomi">Valuasi Ekonomi</option>
                <option value="Satwa">Satwa</option>
                <option value="Pertambangan">Pertambangan</option>
                <option value="Agroforestri">Agroforestri</option>
                <option value="Climate">Climate</option>
                <option value="Perikanan dan Kelautan">Perikanan dan Kelautan</option>
                <option value="Tata Ruang">Tata Ruang</option>
                <option value="Agraria">Agraria</option>
            </select>
        </label>
        @elseif (!$isKeahlian)
            <div class="flex space-x-4 items-center">
                <input  type="text" class="bg-gray-100  text-gray-700 mb-6  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='customkeahlian' placeholder="Custom Keahlian. . . ">
                <svg wire:click='backtokeahlian' xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 cursor-pointer">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
        @endif

    </div>

    <div class=""  x-data="{open:false}" @click.away="open=false">
        <h1 class="text-xl   text-gray-900  mb-1">Provinsi</h1>
        <label class="w-full">
            <div  @click="open=true"   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm  border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$provinsi}}</div>
        </label>

        <div x-show="open" class="shadow px-4 py-4 flex flex-col   bg-black  z-20 w-full"  >
            <input   wire:model='chooseprovinsi' type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Provinsi. . .">
            @foreach ($provincies as $key => $value)
                <a  wire:click="selectProvinsi('{{$value[0]}}')" class="text-white py-1 hover:bg-gray-700 px-4">{{$value[0]}}</a>
            @endforeach
        </div>

    </div>
    <div class="mt-6" >
        <h1 class="text-xl   text-gray-900  mb-1">Catatan</h1>
        <textarea   rows="5"  wire:model.defer='catatan' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Catatan. . ."></textarea>
    </div>

    <div class="flex justify-end mt-4">
        <button wire:click='storeDatabase' class="bg-black py-2 px-4 text-white w-40">Save</button>
    </div>

</div>
