<div class="max-w-5xl mx-auto py-12 px-4">
    <livewire:toastr />
    <h1 class="font-bold sm:text-5xl text-4xl">Tambah database</h1>
    <div class="">
        <h1 class="text-xl   text-gray-900 mt-8 mb-1">Tanggal Kejadian</h1>
        <div class=" sm:w-4/12 w-full" wire:ignore x-init="flatpickr('#tglkejadian', { enableTime: false,dateFormat: 'Y-m-d', disableMobile: 'true'});">
            <input id="tglkejadian" type="text" class="bg-gray-100  text-gray-00  rounded w-full border  py-2 px-4 focus:outline-none  "  wire:model.defer='tglkejadian' placeholder="Date. . . ">
        </div>
    </div>
    <div x-data="{count:0}">
        <h1 class="text-xl   text-gray-900 mt-6 mb-1">Kasus</h1>
        <textarea maxlength="140" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"  rows="2"  wire:model.defer='kasus' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Description. . ."></textarea>
        <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs">
            <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
          </div>
    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0" x-data="{ open: @entangle('isProvinsi') }">
        <div class="sm:w-4/12 w-full" >
            <h1 class="text-xl   text-gray-900  mb-1">Provinsi</h1>
            <label class="w-full">
                <div  wire:click='toogleProvinsi'   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm  border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$provinsi}}</div>
            </label>

            @if ($isProvinsi)
            <div class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20"  >
                <input   wire:model='chooseprovinsi' type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Provinsi. . .">
                @foreach ($provincies as $item)
                    <a wire:click="selectProvinsi({{$item->id }}, '{{$item->name}}')" class="text-white py-1 hover:bg-gray-700 px-4">{{$item->name}}</a>
                @endforeach
            </div>
            @endif


        </div>
        <div class="sm:w-4/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Kabupaten/Kota</h1>
            <label class="w-full">
                <div  wire:click='toogleKabkota'   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm   border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$kabkota}}</div>
            </label>

            @if ($isKabkota)
            <div class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20"  >
                <input   wire:model='choosekabkota' type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Kabupaten Kota. . .">

                @foreach ($kabkotas as $item)
                    <a wire:click="selectKabkota({{$item->id }}, '{{$item->name}}')" class="text-white py-1 hover:bg-gray-700 px-4">{{$item->name}}</a>
                @endforeach

            </div>
            @endif
        </div>
        {{-- lat:{{$lat}} , long:{{$long}} --}}
        <div class="sm:w-4/12 w-full">

            <h1 class="text-xl   text-gray-900  mb-1">Kecamatan</h1>
            <label class="w-full">
                <div  wire:click='toogleKecamatan'   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded text-sm  border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >{{$kecamatan}}</div>
            </label>

            @if ($isKecamatan)
            <div class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20" >
                <input   wire:model='choosekecamatan' type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Kecamatan. . .">
                @foreach ($kecamatans as $item)
                    <a wire:click="selectKecamatan({{$item->id }}, '{{$item->name}}')" class="text-white py-1 hover:bg-gray-700 px-4">{{$item->name}}</a>
                @endforeach
            </div>
            @endif
        </div>
        {{-- <div class="sm:w-3/12 w-full">

            <h1 class="text-xl   text-gray-900  mb-1">Desa</h1>
            <label class="w-full">
                <div  wire:click='toogleDesa'   class="truncate w-full mb-2 bg-gray-100 cursor-pointer  text-gray-700  rounded   border py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20 text-sm" >{{$desa}}</div>
            </label>

            @if ($isDesa)
            <div class="shadow px-4 py-4 flex flex-col   bg-black absolute z-20" >
                <input   wire:model='choosedesa' type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Desa. . .">
                @foreach ($desas as $item)
                    <a wire:click="selectDesa({{$item->id }}, '{{$item->name}}')" class="text-white py-1 hover:bg-gray-700 px-4">{{$item->name}}</a>
                @endforeach
            </div>
            @endif
        </div> --}}
    </div>

    <div class="w-full h-96 z-10 mb-4" id="map" wire:ignore ></div>


    <div x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Issu</h1>
        <textarea maxlength="140" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"  rows="2"  wire:model.defer='issu' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Description. . ."></textarea>
        <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs">
            <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
          </div>
    </div>
    <div x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Korban</h1>
        <textarea maxlength="120" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"  rows="2"  wire:model.defer='korban' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Description. . ."></textarea>
        <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs">
            <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
          </div>
    </div>
    <div x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Pekerjaan</h1>
        <textarea maxlength="60" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"  rows="2"  wire:model.defer='pekerjaan' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Description. . ."></textarea>
        <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs">
            <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
          </div>
    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0">
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Jenis kelamin</h1>
            <label class="w-full"  >
                <select wire:ignore wire:model='jeniskelamin' class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                    <option value="">. . .</option>
                    <option value="Laki-Laku">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki & Perempuan">Laki-laki & Perempuan</option>
                </select>
            </label>
        </div>
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Jumlah korban</h1>
            <input wire:model.defer='jumlahkorban' type="number" name="" id="" class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="0">
        </div>
    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0 mb-2">
        <div class="@if ($pelaku === 'Pelaku Lainnya') sm:w-6/12  @else w-full @endif ">
            <h1 class="text-xl   text-gray-900  mb-1">Pelaku (Multiple)</h1>

            <label class="w-full">
                <div wire:click='tooglePelaku'    type="text" name="" id="" class="w-full mb-2 bg-gray-100  text-gray-700  rounded   border  py-2  px-4 focus:outline-none border-gray-300 dark:border-opacity-20" >  {{$pelaku}}
                    @foreach ($pelakus as $key => $value)
                    <a class="inline-flex justify-between   bg-black text-white  rounded py-2 px-2 focus:outline-none items-center">{{$value}}
                        <svg wire:click='deleteTags({{$key}})' class="ml-1 h-4 w-4 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg></a>
                @endforeach
                </div>
            </label>
            <div class="flex flex-wrap space-x-4">

            </div>
            @if ($isPelaku)
            <div class="shadow px-4 py-4 flex flex-col mt-2  bg-black relative "  >
                    <div class="relative py-4">
                        <div class="absolute top-0 right-0 text-white">
                            <svg wire:click='closePelaku' xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                          </svg></div>
                    </div>
                    <a class=" text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Aparat Kepolisian')" value="1">Aparat Kepolisian</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Brimob')" value="1">Brimob</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Aparat Desa')" value="2">Aparat Desa</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Aparat TNI')" value="2">Aparat TNI</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('OTK')" value="2">OTK</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Perusahaan')" value="2">Perusahaan</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Suruhan Perusahaan')" value="2">Suruhan Perusahaan</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Pengusaha')" value="2">Pengusaha</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Pemerintah Daerah')" value="2">Pemerintah Daerah</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Satpol PP')" value="2">Satpol PP</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Preman')" value="2">Preman</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Kejaksaan')" value="2">Kejaksaan</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Preman Bayaran')" value="2">Preman Bayaran</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Negara')" value="2">Negara</a>
                    <a class="text-white py-1 hover:bg-gray-800 px-4" wire:click="setPelaku('Pelaku Lainnya')" value="2">Pelaku Lainya</a>

            </div>
            @endif
        </div>
        @if ($choosepelaku === 'Pelaku Lainnya')
        <div class="sm:w-6/12 w-full" x-data="{count:0}">
            <h1 class="text-xl   text-gray-900  mb-1">Nama pelaku</h1>
            <input maxlength="60" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" type="text" class="bg-gray-100 dark:bg-newgray-700 text-gray-700  rounded w-full border  py-4 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='namapelaku' placeholder="Title. . . ">
            <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs mt-2">
                <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
              </div>
        </div>
        @endif

    </div>
    <div class="flex sm:flex-row flex-col justify-between sm:space-x-4 space-x-0">
        <div class="sm:w-6/12 w-full">
            <h1 class="text-xl   text-gray-900  mb-1">Akibat</h1>
            <label class="w-full"  >
                <select wire:ignore wire:model='akibat' class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                    <option value="">. . .</option>

                    <option value="Penangkapan">Penangkapan</option>
                    <option value="Penahanan">Penahanan</option>
                    <option value="Meninggal Dunia">Meninggal Dunia</option>
                    <option value="Luka-Luka">Luka-Luka</option>
                    <option value="Gangguan Sikologin">Gangguan Psikologis</option>
                    <option value="Deportasi">Deportasi</option>
                    <option value="Pengrusakan">Pengrusakan</option>
                    <option value="Pembakaran">Pembakaran</option>
                    <option value="Gugatan Hukum">Gugatan Hukum</option>
                    <option value="Pemeriksaan Ilegal">Pemeriksaan Ilegal</option>
                </select>
            </label>
        </div>
        <div class="sm:w-6/12 w-full" x-data="{count:0}">
            <h1 class="text-xl   text-gray-900  mb-1">Konflik Dengan</h1>
            <input maxlength="60" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='konflikdengan' placeholder="Nama. . . ">
            <div class="flex justify-end text-newgray-700   italic text-xs mt-2">
                <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
              </div>
        </div>
    </div>
    <div class="">
        <h1 class="text-xl   text-gray-900  mb-1">Bentuk Ancaman</h1>
        <label class="w-full"  >
            <select wire:ignore wire:model='bentukancaman' class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">. . .</option>

                <option value="Kriminalisasi">Kriminalisasi</option>
                <option value="Ancaman Fisik">Ancaman Fisik</option>
                <option value="Ancaman Psikologin/Non Fisik">Ancaman Psikologis/Non Fisik</option>
            </select>
        </label>
    </div>
    <div class="">
        <h1 class="text-xl   text-gray-900  mb-1">Sektor</h1>
        <label class="w-full"  >
            <select wire:ignore wire:model='sektor' class="w-full mb-6 bg-gray-100  text-gray-700  rounded  border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20">
                <option value="">. . .</option>

                <option value="Lingkungan Hidup">Lingkungan Hidup</option>
                <option value="Hutan">Hutan</option>
                <option value="Kebun">Kebun</option>
                <option value="Tambang">Tambang</option>
                <option value="Energi">Energi</option>
                <option value="Tanah/Tanah Adat">Tanah/Tanah Adat</option>
                <option value="Perairan dan Kelautan">Perairan dan Kelautan</option>

            </select>
        </label>
    </div>
    <div class="" x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Kronologi</h1>
        <textarea  x-ref="countme" x-on:keyup="count = $refs.countme.value.length"  rows="5"  wire:model.defer='kronologi' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Description. . ."></textarea>

    </div>
    <div class="" x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Perkembangan Kasus</h1>
        <textarea maxlength="140" x-ref="countme" x-on:keyup="count = $refs.countme.value.length"  rows="2"  wire:model.defer='perkembangankasus' required class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20" placeholder="Description. . ."></textarea>
        <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs">
            <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
          </div>

    </div>
    <div class="" x-data="{count:0}">
        <h1 class="text-xl   text-gray-900  mb-1">Sumber (Multiple)</h1>
        <div class="flex flex-col">
            @foreach ($sumberurl as $key => $value)
            <a class="inline-flex justify-between mb-2 bg-black text-white  rounded py-2 px-2 focus:outline-none items-center">{{$value}}
                <svg wire:click='deleteURL({{$key}})' class="ml-1 h-4 w-4 cursor-pointer" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
            </a>
            @endforeach
        </div>

        <input maxlength="140" wire:keydown.enter="setsumberURL" x-ref="countme" x-on:keyup="count = $refs.countme.value.length" type="text" class="bg-gray-100  text-gray-700  rounded w-full border  py-2 px-4 focus:outline-none border-gray-300 dark:border-opacity-20"  wire:model.defer='url' placeholder="Url. . . ">
            <div class="flex justify-end text-newgray-700 dark:text-gray-500  italic text-xs mt-2">
                <span x-html="count"></span> / <span  x-html="$refs.countme.maxLength"></span>
              </div>

    </div>
    <div class="flex items-center justify-center px-2 py-2 mt-6 border border-dashed border-gray-400 rounded">
        <label class="cursor-pointer">
            @if (! $photo )
            <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-gray-400 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
              </svg>
            @else
                <img src="{{$photo->temporaryUrl()}}" alt="" class=" mx-auto sm:h-96 h-full w-full rounded ">
            @endif
            <input type='file' class="hidden" wire:model='photo' accept="image/*" />
            <p wire:loading.remove wire:target="photo" class="text-xs text-center text-gray-400 mt-2">Clik to upload image</p>
            <p wire:loading wire:target="photo" class="text-xs text-center text-gray-400">Uploding. . . . . </p>
        </label>
    </div>

    <div class="flex justify-end mt-4">
        <button wire:click='storeDatabase' class="bg-black py-2 px-4 text-white w-40">Save</button>
    </div>

    @push('script')
        <script>
            document.addEventListener("DOMContentLoaded", () => {
                var BING_KEY = "AiS2zkF1f18b_dtsyRlvXj8By-QwkV4byzpFTA9sOjS8q4ELKjz2g09rIiIuJ3BD"
                var map = L.map('map').setView([0.7893, 117.9213],4);


                var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors | EnvironmentalDefender'
                }).addTo(map);

                var bing = L.tileLayer.bing({
                    bingMapsKey : BING_KEY,
                }).addTo(map)


                marker = L.marker(['', '']).addTo(map);
                window.addEventListener('connected', event => {
                        map.removeLayer(marker)
                        marker = L.marker([@this.lat, @this.long]).addTo(map);
                });
                window.addEventListener('deletemarker', event => {
                        map.removeLayer(marker)
                });




                var baseMap = {
                    'Bing' : bing,
                    'OpenStreetMap': osm,

                }
                L.control.layers(baseMap).addTo(map);
            });
        </script>
    @endpush

</div>
