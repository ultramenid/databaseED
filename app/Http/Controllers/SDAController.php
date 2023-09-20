<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SDAController extends Controller
{
    public function index(){
        $title = 'Kasus SDA - ED Database';
        $nav = 'sda';
        return view('sda', compact('title', 'nav'));
    }

    public function addSda(){
        $title = 'Add Kasus SDA - ED Database';
        $nav = 'sda';
        return view('addsda', compact('title', 'nav'));
    }

    public function editsda($id){
        $id = $id;
        $title = 'Edit Kasus SDA - ED Database';
        $nav = 'sda';
        return view('editsda', compact('id', 'title', 'nav'));
    }
}
