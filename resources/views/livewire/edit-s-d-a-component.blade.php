<div class="max-w-5xl mx-auto py-12 px-4">
    <livewire:toastr />
    <h1 class="font-bold sm:text-5xl text-4xl py-12">Edit Kasus SDA</h1>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900 mb-1">Tahun</h1>
            <div class="  w-full"  wire:ignore>
                <select id='date-dropdown' wire:model="tahun" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                </select>
            </div>

        </div>
        {{-- <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Tanggal Update</h1>
            <div class="w-full" wire:ignore x-init="flatpickr('#tglupdate', { enableTime: false,dateFormat: 'Y-m-d', disableMobile: 'true'});">
                <input id="tglupdate" type="text" class="bg-gray-100  text-gray-00  rounded w-full border  py-2 px-4 focus:outline-none  "  wire:model.defer='tglupdate' placeholder="Date. . . ">
            </div>
        </div> --}}

    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-6">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Nama Terdakwa</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='namaterdakwa' placeholder="Nama Terdakwa. . . ">
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Status Terdakwa</h1>
            <label class="w-full"  >
                <select wire:ignore wire:model.defer='statusterdakwa' class="w-full bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                    <option value="">. . .</option>
                    <option value="Pengurus">Pengurus</option>
                    <option value="Korporasi">Korporasi</option>
                    <option value="Individu Dalam Korporasi">Individu dalam korporasi</option>
                </select>
            </label>
        </div>

    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-6">
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Nomor Perkara</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='nomorperkara' placeholder="Nomor Perkara. . . ">

        </div>
        <div class="sm:w-6/12 w-full" x-data="{open:false}" @click.away="open=false">
            <h1 class="text-xl   text-gray-900  mb-1">Wilayah</h1>
            <label class="w-full">
                <div  @click="open=true"   class="truncate w-full  bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm  border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$provinsi}}</div>
            </label>


            <div x-show="open" class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20"  >
                <input   wire:model.defer='chooseprovinsi' type="text" name="" id="" class="w-full   bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Provinsi. . .">
                @foreach ($provincies as $key => $value)
                    <a  wire:click="selectProvinsi('{{$value[0]}}')"  class="text-white py-1 hover:bg-gray-700 px-4">{{$value[0]}}</a>
                @endforeach
            </div>
        </div>




    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Jenis Kasus</h1>
            <label class="w-full"  >
                <select wire:ignore wire:model.defer='jeniskasus' class="w-full bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                    <option value="">. . .</option>
                    <option value="Kebakaran Hutan">Kebakaran Hutan</option>
                    <option value="Illegal Loging">Illegal Loging</option>
                    <option value="Kebun Tanpa Izin Dalam Kawasan">Kebun Tanpa Izin Dalam Kawasan</option>
                    <option value="Tambang Tanpa Izin Dalam Kawasan">Tambang Tanpa Izin Dalam Kawasan</option>
                    <option value="Kerusakan Lingkungan">Kerusakan Lingkungan</option>
                    <option value="Pencemaran Lingkungan (Limbah B3)">Pencemaran Lingkungan (Limbah B3)</option>
                    <option value="Satwa">Satwa</option>
                    <option value="Illegal Fishing">Illegal Fishing</option>
                    <option value="RTRW">RTRW</option>
                    <option value="Korupsi">Korupsi</option>
                </select>
            </label>
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Sektor</h1>
            <label class="w-full"  >
                <select wire:ignore wire:model.defer='sektor' class="w-full bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                    <option value="">. . .</option>
                    <option value="Kehutanan">Kehutanan</option>
                    <option value="Perkebunan">Perkebunan</option>
                    <option value="Pertambangan">Pertambangan</option>
                    <option value="Kelautan">Kelautan</option>
                    <option value="Pembangunan">Pembangunan</option>
                </select>
            </label>
        </div>

    </div>

    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
        <div class="sm:w-6/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Nilai Kerugian</h1>
            <input  type="number" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='nilaikerugian' placeholder="Nilai Kerugian. . . ">

        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Dakwaan</h1>
            <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='dakwaan' placeholder="Dakwaan. . . ">
        </div>

    </div>

    {{-- Tuntutan --}}
    <div class="w-full border py-4 px-4 border-black mt-10">
        <h1 class="text-xl text-center">Tuntutan</h1>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
            <div class="sm:w-6/12 w-full" >
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Pokok</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='tuntutanpenjara' placeholder="Penjara. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='tuntutandenda' placeholder="Denda. . . ">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Tambahan</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='tuntutangantirugi' placeholder="Ganti Rugi. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='tuntutanpemulihan' placeholder="Pemulihan. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='tuntutansitaaset' placeholder="Sita Aset. . . ">
            </div>
        </div>
    </div>

    {{-- Vonis Pengadilan Negeri --}}
    <div class="w-full border py-4 px-4 border-black mt-10">
        <h1 class="text-xl text-center">Vonis Pengadilan Negeri</h1>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
            <div class="sm:w-6/12 w-full" >
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Pokok</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='pnpenjara' placeholder="Penjara. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='pndenda' placeholder="Denda. . . ">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Tambahan</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='pngantirugi' placeholder="Ganti Rugi. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='pnpemulihan' placeholder="Pemulihan. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='pnsitaaset' placeholder="Sita Aset. . . ">
            </div>
        </div>
        <h1 class="   text-gray-900  mb-1">File Putusan</h1>
        <input wire:ignore  type="file"  accept="application/pdf" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='upnfile' placeholder="upload. . . ">
        @if($pnfile)
        <a class="mt-8 text-green-500 underline" href="{{ asset('storage/files/lampiran/'.$pnfile) }}">Putusan Pengadilan Negara </a>
        @endif
    </div>

    {{-- Vonis Pengadilan Tinggi --}}
    <div class="w-full border py-4 px-4 border-black mt-10">
        <h1 class="text-xl text-center">Vonis Pengadilan Tinggi</h1>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
            <div class="sm:w-6/12 w-full" >
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Pokok</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='ptpenjara' placeholder="Penjara. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='ptdenda' placeholder="Denda. . . ">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Tambahan</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='ptgantirugi' placeholder="Ganti Rugi. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='ptpemulihan' placeholder="Pemulihan. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='ptsitaaset' placeholder="Sita Aset. . . ">
            </div>
        </div>
        <h1 class="   text-gray-900  mb-1">File Putusan</h1>
        <input wire:ignore  type="file" accept="application/pdf" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='uptfile' placeholder="upload. . . ">
        @if($ptfile)
        <a class="mt-8 text-green-500 underline" href="{{ asset('storage/files/lampiran/'.$ptfile) }}">Putusan Pengadilan Tinggi </a>
        @endif
    </div>


    {{-- Vonis Mahkamah Agung --}}
    <div class="w-full border py-4 px-4 border-black mt-10">
        <h1 class="text-xl text-center">Vonis Mahkamah Agung</h1>
        <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 sm:space-y-0 space-y-4 mt-5">
            <div class="sm:w-6/12 w-full" >
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Pokok</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='mapenjara' placeholder="Penjara. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='madenda' placeholder="Denda. . . ">

            </div>
            <div class="sm:w-6/12 w-full">
                <h1 class="text-xl   text-gray-900  mb-1 text-center">Pidana Tambahan</h1>
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='magantirugi' placeholder="Ganti Rugi. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='mapemulihan' placeholder="Pemulihan. . . ">
                <input  type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 mt-2"  wire:model.defer='masitaaset' placeholder="Sita Aset. . . ">
            </div>
        </div>
        <h1 class="   text-gray-900  mb-1">File Putusan</h1>
        <input wire:ignore  type="file" accept="application/pdf" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='umafile' placeholder="upload. . . ">
        @if($mafile)
        <a class="mt-8 text-green-500 underline" href="{{ asset('storage/files/lampiran/'.$mafile) }}">Putusan Mahkamah Agung </a>
        @endif
    </div>
    <div class="mt-6" x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Kaidah Hukum</h1>
        <div class="w-full  "
                        wire:ignore
                        x-init="
                        tinymce.init({
                            selector: '#kaidahhukum',
                            height : 500,
                            height : '70vh',
                            relative_urls : false,
                                remove_script_host : false,
                                convert_urls : true,
                                content_style: 'body {  background-color: #f4f5f7; }',
                                plugins:
                                    'lists advlist autolink  link   charmap    anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking table emoticons template  help',

                                    toolbar: ' fullscreen fontfamily fontsizeselect fontsize   bold italic underline forecolor backcolor |  link image  |  bullist numlist   alignleft aligncenter alignright alignjustify outdent indent| ' +
                                            ' | media  | ' +
                                            ' backcolor emoticons |undo redo  help',
                                    menu: {
                                    favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}
                                    },
                                    menubar: ' file edit view insert format tools table help',
                                    file_picker_callback : function(callback, value, meta) {
                                        var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                                        var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
                                        var cmsURL = '/cms/' + 'sawit-filemanager?editor=' + meta.fieldname;
                                        if (meta.filetype == 'image') {
                                            cmsURL = cmsURL + '&type=Images';
                                        } else {
                                            cmsURL = cmsURL + '&type=Files';
                                        }
                                        tinyMCE.activeEditor.windowManager.openUrl({
                                            url : cmsURL,
                                            title : 'Filemanager',
                                            width : x * 0.8,
                                            height : y * 0.8,
                                            resizable : 'yes',
                                            close_previous : 'no',
                                            onMessage: (api, message) => {
                                            callback(message.content);
                                            }
                                        });
                                    },
                                    setup: function(editor) {
                                        editor.on('change', function(e) {
                                            @this.set('kaidahhukum', editor.getContent());
                                    });
                                }
                        });">
                        <textarea rows="20" id="kaidahhukum" name="kaidahhukum"  wire:model.defer='kaidahhukum' required></textarea>

    </div>



    <div class="flex justify-end mt-4">
        <button wire:click='storeDatabase' class="bg-black py-2 px-4 text-white w-40">Update</button>
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


