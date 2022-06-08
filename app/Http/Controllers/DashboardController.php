<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $title = 'Dashboard - ED Database';
        return view('dashboard', compact('title'));
    }

    public function addDatabase(){
        $title = 'Add database';
        return view('addDatabase', compact('title'));
    }

    public function editDatabase($id){
        $id = $id;
        $title = 'Edit Database';
        return view('editDatabase', compact('title','id'));
    }
}
