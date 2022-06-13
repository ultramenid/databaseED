<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class TableDatabase extends Component
{
    use WithPagination;
    // public $deleter = true;
    // public $deleteName, $deleteID;
    public $dataField = 'tanggalkejadian', $dataOrder = 'asc', $paginate = 10, $search = '';

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

    public function delete($id){
        $this->emit('deleteModal', $id);
    }


    public function render()
    {
        $databases = $this->getDatabase();
        return view('livewire.table-database', compact('databases'));
    }
}
