<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class gugatanPerdataExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public function collection()
    {
        return DB::table('dbkasusperdata')->get();
    }

    public function headings(): array
    {
        return [
            "ID - Database",
            "Tahun",
            "Status Eksekusi",
            "Nama Penggugat",
            "Nama Tergugat",
            "Nomor Perkara",
            "Wilayah",
            "Jenis Kasus",
            "Sektor",
            "Nilai Kerugian",
            "Dakwaan",
            "Tuntutan - Gantirugi",
            "Tuntutan - Pemulihan",
            "Tuntutan - Lainya",
            "Vonis Pengadilan Negara - Ganti Rugi",
            "Vonis Pengadilan Negara - Pemulihan",
            "Vonis Pengadilan Negara - Lainya",
            "File Putusan PN",
            "Vonis Pengadilan Tinggi - Ganti Rugi",
            "Vonis Pengadilan Tinggi - Pemulihan",
            "Vonis Pengadilan Tinggi - Lainya",
            "File Putusan PT",
            "Vonis Kasasi MA - Ganti Rugi",
            "Vonis Kasasi MA - Pemulihan",
            "Vonis Kasasi MA - Lainya",
            "File Putusan Kasasi MA",
            "Vonis PK MA - Ganti Rugi",
            "Vonis PK MA - Pemulihan",
            "Vonis PK MA - Lainya",
            "File Putusan PK MA",
            "Kaidah Hukum",
            "Proses",
            "Created_at",
            "Updated_at"
        ];
    }

}
