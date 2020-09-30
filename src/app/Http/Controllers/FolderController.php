<?php

namespace App\Http\Controllers;

use App\Folder;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFolder;

class FolderController extends Controller
{
    public function index() {
        $folders = Folder::all();
        // $folders = Folder::select('id')->get();//カラム指定して取得

        return view('folders/index', [
            'folders' => $folders
        ]);
    }

    public function showCreateForm() {
        return view('folders/create');
    }

    public function create(CreateFolder $request) {

        $folder = new Folder();
        $folder->title = $request->title;
        $folder->save();

        return redirect()->route('folders.index', [
            'id' => $folder->id
        ]);
    }
}
