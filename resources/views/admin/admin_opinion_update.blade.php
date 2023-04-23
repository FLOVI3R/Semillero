@extends('adminlte::page')

@section('title', 'Editar Opinión')

@section('content_header')
    <h1>EDITAR OPINIÓN</h1>
@stop

@section('content')
    <form action="{{ route('editOpinion', $opinion->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <h2>Título: </h1>
            <input type="text" name="headline" value="{{ $opinion->headline }}" class="form-control">
        </div>
        <div class="form-group">
            <h2>Descripción: </h1>
            <input type="text" name="description" value="{{ $opinion->description }}" class="form-control">
        </div>
        <div class="form-group">
            <h2>Num. Likes: </h1>
            <input type="text" name="num_likes" value="{{ $opinion->num_likes }}" class="form-control">
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
              text: "Va a editar una opinión de la base de datos. ¿Está seguro de querer editar esta opinión?",
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