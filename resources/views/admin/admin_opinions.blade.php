@extends('adminlte::page')

@section('title', 'OPINIONES')

@section('content_header')
    <h1>MENÚ DE OPINIONES</h1>
@stop

@section('content')
<div class="card-body p-0">
    <div>
        <a href="createOpinionForm">Crear nueva opinión</a>
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th style="width: 10px">ID</th>
                    <th style="width: 200px">ID PLAGA</th>
                    <th style="width: 200px">TÍTULO</th>
                    <th style="width: 200px">DESCRIPCIÓN</th>
                    <th style="width: 500px">LIKES</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($opinions as $opinion)
                <tr>
                    <th scope="row">{{ $opinion->id }}</th>
                    <td>{{ $opinion->plague_id }}</td>
                    <td>{{ $opinion->headline }}</td>
                    <td>{{ $opinion->description }}</td>
                    <td>{{ $opinion->num_likes }}</td>
                    <td>
                    <form action="{{ route('updateOpinion', $opinion->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-block btn-outline-secondary btn-sm">Editar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('deleteOpinion', $opinion->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-block btn-outline-danger btn-sm show_confirm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@stop

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
 
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Confirmación para eliminar opinión`,
              text: "Va a eliminar una opinión de la base de datos. ¿Está seguro de querer eliminar esta opinión?",
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