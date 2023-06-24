@extends('adminlte::page')

@section('title', '商品編集')

@section('content_header')
    <h1>商品編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" action="{{ route('items.update', $item->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $item->name }}">
                        </div>

                        <div class="form-group">
                            <label for="type">種別</label>
                            <select class="form-control" id="type" name="type">
                                <option value="1" {{ $item->type == 1 ? 'selected' : '' }}>アウター</option>
                                <option value="2" {{ $item->type == 2 ? 'selected' : '' }}>トップス</option>
                                <option value="3" {{ $item->type == 3 ? 'selected' : '' }}>ボトムス</option>
                                <option value="4" {{ $item->type == 4 ? 'selected' : '' }}>スカート</option>
                                <option value="5" {{ $item->type == 5 ? 'selected' : '' }}>アクセサリー</option>
                                <option value="6" {{ $item->type == 6 ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" value="{{ $item->detail }}">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">更新</button>
                        <button type="submit" form="delete-form" class="btn btn-danger">削除</button>
                    </div>
                </form>

                <form id="delete-form" method="POST" action="{{ route('items.destroy', $item->id) }}" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
