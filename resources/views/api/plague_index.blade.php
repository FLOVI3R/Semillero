@extends('layouts.app')

@section('content_header')
    <h1>OPINIONES</h1>
@stop

@section('content')
<div class="card-body p-0">
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 200px">ID PLAGA</th>
                    <th style="width: 200px">NOMBRE</th>
                    <th style="width: 200px">IMAGEN</th>
                </tr>
            </thead>
            <tbody>
                @foreach($plagues as $plague)
                <tr>
                    <td>{{ $plague->id }}</td>
                    <td>{{ $plague->name }}</td>
                    <td>{{ $plague->img }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop