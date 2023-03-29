@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>EDITAR USUARIO</h1>
@stop

@section('content')
    <form action="{{ route('editUser', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <h2>Nombre: </h1>
            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
        </div>
        <div class="form-group">
            <h2>Apellidos: </h1>
            <input type="text" name="surname" value="{{ $user->surname }}" class="form-control">
        </div>
        <div class="form-group">
            <h2>Email: </h1>
            <input type="text" name="email" value="{{ $user->email }}" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn-outline-primary btn-sm show_confirm">Editar</button>
        </div>
    </form>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Confirmación para editar usuario`,
              text: "Va a editar un usuario de la base de datos. ¿Está seguro de querer editar este usuario?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willUpdate) => {
            if (willUpdate) {
              form.submit();
            }
          });
      });
  
</script>
@stop