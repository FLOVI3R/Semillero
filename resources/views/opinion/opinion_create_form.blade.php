@extends('adminlte::page')

@section('title', 'Crear Opinión')

@section('content_header')
    <h1>CREAR OPINIÓN</h1>
@stop

@section('content')
<form action="{{ route('OpinionApi') }}" method="POST">
        @csrf
        <div class="form-group">
            <h2>Plaga: </h1>
                <select name="plague_id" class="form-control">
                @foreach($plagues as $plague)
                    <option value = "{{ $plague->id }}"> {{ $plague->name }}
                @endforeach
                </select>
        </div>
        <div class="form-group">
            <h2>Título: </h1>
            <input type="text" name="headline" class="form-control">
        </div>
        <div class="form-group">
            <h2>Descripción: </h1>
            <input type="text" name="description" class="form-control">
        </div>
        <div>
            <button type="submit" class="btn-outline-primary btn-sm show_confirm">Crear opinión</button>
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
              title: `Confirmación para crear opinión`,
              text: "Va a crear una opinión y añadirla a la base de datos. ¿Está seguro de querer crear esta opinión?",
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