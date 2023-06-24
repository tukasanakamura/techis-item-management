@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <!-- 検索 -->
            <form method="GET" action="{{ url('/items') }}">
                <div class="row"> 
                    <div class="col-md-4 form-group"> 
                        <input type="text" class="form-control" name="search" placeholder="商品名を入力">
                    </div>
                    <!-- ドロップダウン -->
                    <div class="col-md-4 form-group"> 
                        <select class="form-control" name="type">
                            <option value="">種別を選択</option>
                            <option value="1">アウター</option>
                            <option value="2">トップス</option>
                            <option value="3">ボトムス</option>
                            <option value="4">スカート</option>
                            <option value="5">アクセサリー</option>
                            <option value="6">その他</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <button type="submit" class="btn btn-primary">検索</button>
                    </div>
                </div> 
            </form>
            <!-- エラーメッセージの表示 -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>名前</th>
                                <th>種別</th>
                                <th>詳細</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $categories = [
                                    1 => 'アウター',
                                    2 => 'トップス',
                                    3 => 'ボトムス',
                                    4 => 'スカート',
                                    5 => 'アクセサリー',
                                    6 => 'その他',
                                ];
                            @endphp
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $categories[$item->type] }}</td>
                                    <td>{{ $item->detail }}</td>
                                    <td>
                                    <a href="{{ route('items.edit', $item->id) }}" class="btn btn-default">編集</a> 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
