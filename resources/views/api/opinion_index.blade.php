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
                    <th style="width: 200px">TÍTULO</th>
                    <th style="width: 200px">DESCRIPCIÓN</th>
                    <th style="width: 200px">LIKES</th>
                </tr>
            </thead>
            <tbody>
                @foreach($opinions as $opinion)
                <tr>
                    <td>{{ $opinion->plague_id }}</td>
                    <td>{{ $opinion->headline }}</td>
                    <td>{{ $opinion->description }}</td>
                    <td>{{ $opinion->num_likes }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop