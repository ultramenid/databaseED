<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableDatabase extends Component
{

    public $dataField = 'kasus', $dataOrder = 'asc', $paginate = 10, $search = '';

    public function getDatabase(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('eddatabase')
                        ->select('kasus', 'tanggalkejadian', 'kronologi', 'id')
                        ->where('kasus', 'like', $sc)
                        ->orderBy($this->dataField, $this->dataOrder)
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }


    public function render()
    {
        $databases = $this->getDatabase();
        return view('livewire.table-database', compact('databases'));
    }
}