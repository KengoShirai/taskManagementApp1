<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //選択されたフォルダidをパラメータとして取得
    public function index(int $folder_id) {
        //フォルダidでタスクを全部取得
        // $tasks = Task::where('folder_id', $folder_id)->get();

        //選ばれたフォルダを取得
        $current_folder = Folder::find($folder_id);
        //選ばれたフォルダに紐づくタスクを取得
        $tasks = $current_folder->tasks()->get();//モデルで設定している

        //タスクをViewへ返却
        return view('tasks/index', [
            'tasks' => $tasks
        ]);
    }

}
