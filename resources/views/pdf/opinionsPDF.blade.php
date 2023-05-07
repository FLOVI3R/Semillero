<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PDF AutoGenerado - Likes a Opiniones sobre Plagas</title>
    </head>
    <body>
        <h1>{!! $title !!}</h1>
        <h2>Nombre: {{ $name }}</h2>
        <h2>Apellidos: {{ $surname }}</h2>
        @foreach($likes as $like)
            @foreach($opinions as $opinion)
                @if($like->opinion_id === $opinion->id)
                    <p>Título: {{ $opinion->headline }} - Descripción: {{ $opinion->description }}</p>
                @endif
            @endforeach
        @endforeach
        @if($likes === NULL)
            <p>No se ha encontrado ninguna opinión en la base de datos con Like.</p>
        @endif
    </body>
</html>