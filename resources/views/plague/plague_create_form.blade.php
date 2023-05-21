@extends('adminlte::page')

@section('title', 'Crear Opinión')

@section('content_header')
    <h1>CREAR PLAGA</h1>
@stop

@section('content')
<form action="{{ route('PlagueApi') }}" method="POST">
        @csrf
        <div class="form-group">
            <h2>Nombre: </h1>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <h2>Imagen: </h1>
            <input type="text" name="img" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn-outline-primary btn-sm show_confirm">Crear Plaga</button>
        </div>
    </form>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Confirmación para crear plaga`,
              text: "Va a crear una plaga y añadirla a la base de datos. ¿Está seguro de querer crear esta plaga?",
              icon: "warning",
              buttons: true,
              dangerMode: false,
          })
          .then((willUpdate) => {
            if (willUpdate) {
              form.submit();
            }
          });
      });
  
</script>
@stop