@extends('adminlte::page')

@section('title', 'Editar Opinión')

@section('content_header')
    <h1>EDITAR PLAGA</h1>
@stop

@section('content')
    <form action="{{ route('PlagueApi', $opinion->id) }}" method="PUT">
        @csrf
        <div class="form-group">
            <h2>Nombre: </h1>
            <input type="text" name="name" value="{{ $plague->name }}" class="form-control">
        </div>
        <div class="form-group">
            <h2>Imagen: </h1>
            <input type="text" name="img" value="{{ $plague->img }}" class="form-control">
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
              title: `Confirmación para editar opinión`,
              text: "Va a editar una plaga de la base de datos. ¿Está seguro de querer editar esta plaga?",
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