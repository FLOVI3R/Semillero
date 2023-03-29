@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Activación de cuenta necesaria.</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Auth::user()->activated === 0)
                        Para acceder a la página principal primero un administrador debe activar su cuenta. 
                    @else
                        <a href="user">Página principal</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
