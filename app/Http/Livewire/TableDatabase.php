<?php

namespace App\Http\Livewire;

use App\Exports\UsersExport;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;

class TableDatabase extends Component
{
    use WithPagination;
    use Exportable;

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



    public function exportExcel(){
      return  Excel::download(new UsersExport, 'rawEDdatabase.xlsx');
    }

    public function delete($id){
        $this->emit('deleteModal', $id);
    }
    public function updatedSearch(){
        $this->resetPage();
    }


    public function render()
    {
        $databases = $this->getDatabase();
        return view('livewire.table-database', compact('databases'));
    }
}
