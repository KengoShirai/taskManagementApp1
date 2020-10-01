@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-12">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ一覧</div>
          <div class="panel-body">
            <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
              フォルダを追加する
            </a>
          </div>
          <div class="list-group">
            @foreach($folders as $folder)
              <a href="{{ action('TaskController@index', $folder->id) }}" class="list-group-item">
                {{ $folder->title }}
              </a>
            @endforeach
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection