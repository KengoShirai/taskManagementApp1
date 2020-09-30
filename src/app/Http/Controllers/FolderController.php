<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index() {
        $folders = Folder::all();
        // $folders = Folder::select('id')->get();//カラム指定して取得

        return view('folders/index', [
            'folders' => $folders
        ]);
    }
}
