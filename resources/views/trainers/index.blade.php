@extends('layouts.app')

@section('title','players')

{{-- @push('styles')
    <link href="{{ asset('css/style-trainers.css') }}" rel="stylesheet">
@endpush --}}

@section('content')    

    <div class="row">
        @foreach ($trainers as $trainer)
            <div class="col-sm">
                <div class="card text-center h-100 trainer-card">
                <img class="card-img-top avatar rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
                    <div class="card-body">
                        <h5 class="card-title">{{$trainer->name}}</h5>
                        <p class="card-text">{{$trainer->description}}</p>
                    {{-- <a href="/trainers/{{$trainer->id}}" class="btn btn-primary">Ver más...</a> --}}
                        <a href="/trainers/{{$trainer->slug}}" class="btn btn-primary">Ver más...</a> {{-- ya no usamos el id, sino el slug --}}
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
