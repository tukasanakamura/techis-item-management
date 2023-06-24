@extends('adminlte::page')

@section('title', 'ホーム')

@section('content_header')
    <h1>{{ date('Y-m-d H:i:s') }}</h1>
@stop

@section('content')
    <p>サイドバーメニューより操作を選択してください。</p>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
