@extends('adminlte::page')

@section('title', 'ユーザー管理')

@section('content_header')
    <h1>ユーザー管理</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ユーザー管理</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>名前</th>
                                <th>メール</th>
                                <th>役割</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role == 0 ? 'ユーザー' : '管理者' }}</td>
                                    <td>
                                        <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-primary">編集</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
