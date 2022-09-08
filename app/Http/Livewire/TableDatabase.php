<?php

namespace App\Http\Livewire;

use App\Exports\UsersExport;
use Carbon\Carbon;
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
    public $dataField = 'tanggalkejadian', $dataOrder = 'asc', $paginate = 10, $search = '', $start = "2014-01-01", $end;

    public function mount(){
        $this->end = Carbon::now('Asia/Jakarta')->format('Y-m-d');
    }

    public function sortingField($field){
        $this->dataField = $field;
        $this->dataOrder = $this->dataOrder == 'asc' ? 'desc' : 'asc';
    }

    protected $listeners = ['updateTable' => 'setFilter'];
    public function setFilter($start, $end){
        $this->start = $start;
        $this->end = $end;
    }
    public function getDatabase(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('eddatabase')
                        ->select('kasus', 'tanggalkejadian', 'kronologi', 'id')
                        ->where('kasus', 'like', $sc)
                        ->orderBy($this->dataField, $this->dataOrder)
                        ->whereBetween('tanggalkejadian', [$this->start, $this->end])
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }



    public function exportExcel(){
      return  Excel::download(new UsersExport($this->start, $this->end), 'rawEDdatabase.xlsx');
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
