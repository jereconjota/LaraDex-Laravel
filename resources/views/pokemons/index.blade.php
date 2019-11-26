@extends('layouts.app')

@section('title','Pokemons')

@section('content')
    <add-pokemon-btn></add-pokemon-btn>
    <pokemons-component></pokemons-component>
    <create-pokemon></create-pokemon>
@endsection