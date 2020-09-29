<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;

class FolderController extends Controller
{
    public function index()
    {
        $folders = Folder::all();

        return view('folders/index', [
            'folders' => $folders,
        ]);
    }
}
