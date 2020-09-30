<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
<header>
  <nav class="my-navbar">
    <a class="my-navbar-brand" href="/">ToDo App</a>
  </nav>
</header>
<main>
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <nav class="panel panel-default">
          <div class="panel-heading">タスク</div>
          <div class="panel-body">
            <a href="#" class="btn btn-default btn-block">
              タスクを追加する
            </a>
          </div>
          <table class="table">
            <thead>
            <tr>
            <th>タイトル</th>
            <th>状態</th>
            <th>期限</th>
            <th></th>
            <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                <td>{{ $task->title }}</td>
                <td>
                    <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                </td>
                <td>{{ $task->due_date }}</td>
                <td><a href="#">編集</a></td>
                <td><a href="#">削除</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </nav>
      </div>
    </div>
  </div>
</main>
</body>
</html>