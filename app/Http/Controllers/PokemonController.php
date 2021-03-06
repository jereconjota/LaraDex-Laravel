<?php

namespace LaraDex\Http\Controllers;
use LaraDex\Pokemon;
use LaraDex\Trainer;

use Illuminate\Http\Request;

class PokemonController extends Controller
{
    public function index(Trainer $trainer, Request $request){
        if ($request->ajax()) {
            //  $pokemons = Pokemon::all();
            
            // return response()->json(
            //     [['id'=> 1, 'name'=> 'Pikachu'],
            //     ['id'=> 2, 'name'=> 'cubebom'],
            //     ['id'=> 3, 'name'=> 'Charizard'],]
            // );

            // $pokemons = $trainer->pokemons;
            // return response()->json($pokemons,200);
            
            return response()->json($trainer->pokemons,200);

        }
        return view('pokemons.index');
    }

    public function store(Trainer $trainer, Request $request){
        if ($request->ajax()) {
            $pokemon = new Pokemon();
            $pokemon->name = $request->input('name');
            $pokemon->picture = $request->input('picture');

            $pokemon->trainer()->associate($trainer)->save();
            // $pokemon->save();

            return response()->json([
                "trainer" => $trainer,
                "message" => "Pokemon creado correctamente.",
                // "pokemon" => $pokemon,
            ], 200);

        }
    }
}
