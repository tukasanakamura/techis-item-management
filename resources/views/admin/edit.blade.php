@extends('adminlte::page')

@section('title', 'ユーザー編集')

@section('content_header')
    <h1>ユーザー編集</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー編集</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">メール</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="role">ロール</label>
                            <select class="form-control" id="role" name="role">
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>ユーザー</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>管理者</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">更新</button>
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>

                    <form method="POST" action="{{ route('admin.destroy', $user->id) }}" style="margin-top: 1em;">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
