<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PutusanSatwaComponent extends Component
{
    use WithPagination;
    public $deleteName, $deleteID, $deleter;
    public $dataField = 'tahun', $dataOrder = 'desc', $paginate = 10, $search = '';

    public function getPutusanSatwa(){
        $sc = '%' . $this->search . '%';
        try {
            return  DB::table('dbputusansatwa')
                        ->select('id','tahun', 'object', 'dakwaan', 'terdakwa')
                        ->where('terdakwa', 'like', $sc)
                        ->orderBy($this->dataField, $this->dataOrder)
                        ->paginate($this->paginate);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public function closeDelete(){
        $this->deleter = false;
        $this->deleteName = null;
        $this->deleteID = null;
    }
    public function delete($id){

        //load data to delete function
        $dataDelete = DB::table('dbputusansatwa')->where('id', $id)->first();
        $this->deleteName = $dataDelete->terdakwa;
        $this->deleteID = $dataDelete->id;

        $this->deleter = true;
    }
    public function deleting($id){
        DB::table('dbputusansatwa')->where('id', $id)->delete();

        $message = 'Successfully delete gugatan perdata';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }
    public function render()
    {
        $databases = $this->getPutusanSatwa();
        // dd($databases);
        return view('livewire.putusan-satwa-component', compact('databases'));
    }
}
