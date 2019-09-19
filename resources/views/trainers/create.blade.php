@extends('layouts.app')

@section('title','Trainers create')

@section('content')    

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- @if ($errors->has('name'))
        <h1>{{$errors->first('name')}}</h1>
    @endif --}}
    {{-- trainers.store -> la ruta de almacenamiento dentro de nuestro controlador --}}

    {{-- ///////////////////////////////////////////////////////////////////// --}}
    {{-- /////////////    LARAVEL COLLECTIVE   /////////////////////////////// --}}
    {{-- {!! Form::open(['route' => 'trainers.store', 'method' => 'POST', 'files' => true]) !!}
        
        @include('trainers.form') 
        usamos el componente para reutilizar codigo, si quisieramos usarlo en otra vista

        {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!} --}}
    {{-- ///////////////////////////////////////////////////////////////////// --}}



    {{-- ///////////////////////////////////////////////////////////////////// --}}
    {{-- /////////     BLADE     ///////////////////////////////////////////// --}}     

    <form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data">
        {{-- directiva de blade para proteger formularios  --}}
        @csrf   
        @include('trainers.form') 

        {{-- Los campos del form deben tener mismo nombre de los que se van a guardar/editar/eliminar de la bd --}}
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>

@endsection
{{-- ///////////////////////////////////////////////////////////////////// --}}





{{-- ///////////////////////////////////////////////////////////////////// --}}
{{-- ////////////   HTML 5      ////////////////////////////////////////// --}}
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="form-group">
            <label for="">Nomber</label>
            <input type="text" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</body>
</html> --}}