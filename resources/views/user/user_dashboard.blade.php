@extends('layouts.app')

@section('content')
<div class="card-body p-0">
    <form action="{{ route('generatePDF') }}" method="GET">
        @csrf
        <button type="submit" class="btn btn-primary">Generar PDF</button>
    </form>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">CABECERA</th>
                    <th style="width: 200px">DESCRIPCIÓN</th>
                    <th style="width: 200px">PLAGA</th>
                    <th style="width: 200px">NÚMERO LIKES</th>
                    <th style="width: 200px"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($opinions as $opinion)
                <tr>
                    <th scope="row">{{ $opinion->headline }}</th>
                    <td>{{ $opinion->description }}</td>
                    <td>{{ $opinion->plague_id }}</td>
                    <td>{{ $opinion->num_likes }}</td>
                    <td>
                        <form action="{{ route('likeOpinion', $opinion->id) }}" method="POST">
                            @csrf   
                            <button type="submit" class="btn btn-block btn-outline-primary btn-sm show_confirm">LIKE</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection