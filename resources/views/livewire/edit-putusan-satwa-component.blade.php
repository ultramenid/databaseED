<div class="max-w-5xl mx-auto py-12 px-4">
    <livewire:toastr />
    <h1 class="font-bold sm:text-5xl text-4xl py-12">Tambah Putusan Satwa</h1>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900 mb-1">Tahun</h1>
            <div class="w-full"  >
                <select id='date-dropdown' wire:ignore wire:model.defer="tahun"  class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                    <option value="">Pilih Tahun</option>
                </select>
            </div>

        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Terdakwa</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='terdakwa' placeholder="terdakwa. . . ">

        </div>

    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mt-5" >
        <div class="sm:w-6/12 w-full" x-data="{open:false}" @click.away="open=false">
            <h1 class="text-xl   text-gray-900  mb-1">Provinsi</h1>
            <label class="w-full">
                <div  @click="open=true"   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm  border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$provinsi}}</div>
            </label>


            <div x-show="open" class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20"  >
                <input   wire:model='chooseprovinsi' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="provinsi. . .">
                @foreach ($provincies as $key => $value)
                    <a  wire:click="selectProvinsi('{{$value[0]}}')"  class="text-white py-1 hover:bg-gray-700 px-4">{{$value[0]}}</a>
                @endforeach
            </div>



        </div>
        <div class="sm:w-6/12 w-full" x-data="{open:false}" @click.away="open=false">
            <h1 class="text-xl   text-gray-900  mb-1">Kabupaten/Kota</h1>
            <label class="w-full">
                <div  @click="open=true"   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm   border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$kabkota}}</div>
            </label>


            <div x-show="open" class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20"  >
                <input   wire:model='choosekabkota' type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="kabupaten kota. . .">

                @foreach ($kabkotas as $key => $value)
                    <a wire:click="selectKabkota('{{$value[0]}}')"  class="text-white py-1 hover:bg-gray-700 px-4">{{$value[0]}}</a>
                @endforeach

            </div>
        </div>

    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mt-5" >
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Object</h1>
            <textarea   rows="4"  wire:model.defer='object' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="object. . ."></textarea>
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Dakwaan</h1>
            <textarea   rows="4"  wire:model.defer='dakwaan' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="dakwaan. . ."></textarea>
        </div>
    </div>
    <div class="border p-4 mt-5">
        <h1 class="text-xl   text-gray-900  mb-1 font-bold">Ancaman</h1>

        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mt-5" >
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1">UU - Penjara</h1>
                <input   wire:model='ancamanuupenjara' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="ancaman UU penjara. . .">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1">UU - Denda</h1>
                <input   wire:model='ancamanuudenda' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="ancaman UU denda. . .">
            </div>
        </div>
    </div>

    <div class="border p-4 mt-5">
        <h1 class="text-xl   text-gray-900  mb-1 font-bold">Tuntutan</h1>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mt-5" >
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1">Penjara/bulan</h1>
                <input   wire:model='tuntutanpenjara' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="tuntutan penjara. . .">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1">Denda</h1>
                <input   wire:model='tuntutandenda' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="tuntutan denda. . .">
            </div>
        </div>
    </div>
    <div class="border p-4 mt-5">
        <h1 class="text-xl   text-gray-900  mb-1 font-bold">Putusan</h1>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mt-5" >
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1">Penjara/bulan</h1>
                <input   wire:model='putusanpenjara' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="putusan penjara. . .">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1">Denda</h1>
                <input   wire:model='putusandenda' type="text" name="" id="" class="w-full mb-2  bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="putusan denda. . .">
            </div>
        </div>
    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mt-5" >
        <div class=" w-full">
            <h1 class="text-xl   text-gray-900  mb-1">No Putusan PN</h1>
            <textarea   rows="4"  wire:model.defer='noputusan' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="no putusan. . ."></textarea>
        </div>

    </div>

    <div class="flex justify-end mt-4">
        <button wire:click='storeDatabase' class="bg-black py-2 px-4 text-white w-40">Save</button>
    </div>


    <script>
        let dateDropdown = document.getElementById('date-dropdown');

        let currentYear = new Date().getFullYear();
        let earliestYear = 2000;
        while (currentYear >= earliestYear) {
            let dateOption = document.createElement('option');
            dateOption.text = currentYear;
            dateOption.value = currentYear;
            dateDropdown.add(dateOption);
            currentYear -= 1;
        }

    </script>
</div>
