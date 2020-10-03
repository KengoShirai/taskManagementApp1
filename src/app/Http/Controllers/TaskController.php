<?php

namespace App\Http\Controllers;

use App\Folder;
use App\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTask;
use App\Http\Requests\EditTask;

class TaskController extends Controller
{
    //選択されたフォルダidをパラメータとして取得
    public function index(int $id) {
        //フォルダidでタスクを全部取得
        // $tasks = Task::where('folder_id', $folder_id)->get();

        //選ばれたフォルダを取得
        $current_folder = Folder::find($id);
        //選ばれたフォルダに紐づくタスクを取得
        $tasks = $current_folder->tasks()->get();//モデルで設定している

        //タスクをViewへ返却
        return view('tasks/index', [
            'tasks' => $tasks,
            'folder_id' => $id
        ]);
    }

    public function showCreateForm(int $id) {
        return view('tasks/create', [
            'folder_id' => $id
            ]);
        }

    public function showEditForm(int $id, int $task_id) {
        $task = Task::find($task_id);

        return view('tasks/edit', [
            'task' => $task
        ]);
    }

    public function edit(int $id, int $task_id, EditTask $request) {
        //リクエストされたタスクIDでタスクデータを取得
        $task = Task::find($task_id);

        // 編集する情報を入れる
        $task->title = $request->title;
        $task->status = $request->status;
        $task->due_date = $request->due_date;
        $task->save();

        //リダイレクト
        return redirect()->route('tasks.index', [
            'id' => $task->folder_id
        ]);
    }

    public function create(int $id, CreateTask $request) {

        $current_folder = Folder::find($id);

        $task = new Task();
        $task->title = $request->title;
        $task->due_date = $request->due_date;

        $current_folder->tasks()->save($task);

        return redirect()->route('tasks.index', [
            'id' => $current_folder->id,
        ]);
    }
}
