<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements  FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('eddatabase')
        ->get();
    }
    public function headings(): array
    {
        return [
            "id",
            "tanggalkejadian",
            "kasus",
            "provinsi",
            "kabkota",
            "kecamatan",
            "issu",
            "korban",
            "pekerjaan",
            "jeniskelamin",
            "jumlahkorban",
            "pelaku",
            "namapelaku",
            "akibat",
            "konflikdengan",
            "bentukancaman",
            "sektor",
            "kronologi",
            "perkembangankasus",
            "sumber",
            "lat",
            "long",
            "img",
            "created_at",
            "updated_at",
        ];
    }

}
