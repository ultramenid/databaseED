<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AhliController extends Controller
{
    public function index(){
        $title = 'Dashboard Ahli - ED Database';
        $nav = 'ahli';
        return view('ahli', compact('title', 'nav'));
    }

    public function addahli(){
        $title = 'Add Dashboard Ahli - ED Database';
        $nav = 'ahli';
        return view('addahli', compact('title', 'nav'));
    }

    public function editahli($id){
        $title = 'edit Dashboard Ahli - ED Database';
        $nav = 'ahli';
        $id = $id;
        return view('editahli', compact('title', 'nav', 'id'));
    }
}
