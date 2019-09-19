@extends('layouts.app')

@section('title','players')

{{-- @push('styles')
    <link href="{{ asset('css/style-trainers.css') }}" rel="stylesheet">
@endpush --}}

@section('content')    

<img class="card-img-top avatar-especifico rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
<div class="text-center">
    <h5 class="card-title">{{$trainer->name}}</h5>
    <p class="card-text">{{$trainer->description}}</p>
    <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
</div>
@endsection
