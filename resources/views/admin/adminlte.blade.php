@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@php 
    $heads = [
        '商品番号',
        '備考',
        '作成日時',
        '更新日時',
        '',
        '',
    ];
    $config = [
        'dom' => 'Bftrip',
        'order' => [
            [0, 'asc']
        ],
   ];
@endphp

@section('content')
<x-adminlte-datatable class="mytable table-sm table-striped table-hover" id="mytable" :heads="$heads" :config="$config">
        @for ($i = 1; $i <= 3; $i++)
            <tr>
                <td>Product {{$i}}</td>
                <td>Note for Product {{$i}}</td>
                <td>2023-07-30</td>
                <td>2023-07-30</td>

                <td class="md:px-4 py-3">
                    <a href="#" class="btn btn-primary" style="font-size:small;">編集</a>
                </td>                            <td class="md:px-4 py-3">
                    <form method="post" action="#">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger" style="font-size:small;">削除</button>
                    </form>
                </td>

            </tr>
        @endfor
    </x-adminlte-datatable>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@stop