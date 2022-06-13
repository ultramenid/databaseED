<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DeleterModal extends Component
{
    public $deleteName, $deleteID, $deleter = false;
    protected $listeners = ['deleteModal' => 'showModal'] ;

    public function showModal($id){
        $dataDelete = DB::table('eddatabase')->where('id', $id)->first();
        $this->deleteID = $id;
        $this->deleter = true;
        $this->deleteName = $dataDelete->kasus;
        // dd($id);
    }

    public function closeDelete(){
        $this->deleter = false;
        $this->deleteID = null;
        $this->deleteName = null;
    }

    public function deleting($id){
        DB::table('eddatabase')->where('id', $id)->delete();

        $message = 'Successfully deleting internal news';
        $type = 'success'; //error, success
        $this->emit('toast',$message, $type);


        $this->closeDelete();
    }

    public function render()
    {
        return view('livewire.deleter-modal');
    }
}
