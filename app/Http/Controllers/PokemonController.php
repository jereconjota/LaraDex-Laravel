<?php

namespace LaraDex\Http\Controllers;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Request $request){
        if ($request->ajax()) {
            return response()->json([ 
                ['id'=> 1, 'name'=> 'Pikachu'],
                ['id'=> 2, 'name'=> 'cubebom'],
                ['id'=> 3, 'name'=> 'Charizard'],
            ]);
        }
        return view('pokemons.index');
    }
}
