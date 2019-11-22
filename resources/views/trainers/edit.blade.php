@extends('layouts.app')

@section('title','Trainers edit')

@section('content')    

    {{-- ///////////////////////////////////////////////////////////////////// --}}
    {{-- /////////////    LARAVEL COLLECTIVE   /////////////////////////////// --}}
    {{-- {!! Form::model($trainer, ['route' => ['trainers.update', $trainer], 'method' => 'PUT', 'files' => true]) !!}

        <div class="form-gorup">
            {!! Form::label('name', 'Nombre') !!}
            {!! Form::text('name', null, ['class'=> 'form-control']) !!}
        </div>

        <div class="form-gorup">
            {!! Form::label('description', 'Descripcion') !!}
            {!! Form::text('description', null, ['class'=> 'form-control']) !!}
        </div>

        <div class="form-gorup">
            {!! Form::label('avatar', 'avatar') !!}
            {!! Form::file('avatar') !!}
        </div>
            
        {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!} --}}




    {{-- ///////////////////////////////////////////////////////////////////// --}}
    {{-- /////////     BLADE     ///////////////////////////////////////////// --}}     
    <form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data">
        {{-- directiva de blade para utilizar un metodo que envie oculta la informacion (?) --}}
        @method('PUT')
        {{-- directiva de blade para proteger formularios  --}}
        @csrf 

        @include('trainers.form') 

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

@endsection
