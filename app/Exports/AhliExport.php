<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AhliExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('dbahli')
        ->select('kriteriaahli', 'nama', 'gelar', 'jabatan', 'afliasi', 'telp', 'email', 'publikasi', 'stasi', 'keahlian', 'provinsi', 'catatan')
        ->get();
    }

    public function headings(): array
    {
        return [
            "Kriteria Ahli",
            "Nama",
            "Gelar",
            "Jabatan",
            "Afliasi",
            "Telp",
            "Email",
            "Publikasi",
            "stasi",
            "Keahlian",
            "Provinsi",
            "Catatan",
        ];
    }
}
