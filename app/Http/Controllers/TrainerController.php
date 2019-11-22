<?php

namespace LaraDex\Http\Controllers;

use LaraDex\Trainer;
use Illuminate\Http\Request;
use LaraDex\Http\Requests\StoreTrainerRequest;
class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','user']);

        $trainers = Trainer::all();

        return view('trainers.index',compact('trainers')); //compact hace un array con la info que le asignemos
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    // public function store(StoreTrainerRequest $request)
    {
        //////////////////////////////////////////////////////////////////////////
        //para ver los datos que trae la peticion del usuario
        // return $request->input('description');
        // return $request->all();
        // return $request; //para ver los datos que trae la peticion del usuario
        //////////////////////////////////////////////////////////////////////////

        //Asi esta en el tutorial pero no funiona:
        // if ($request->hasFile('avatar')) {
        //     $file = $request->file('avatar');
        //     $filename = time().$file->getClientOriginalName();
        //     $file->move(public_path().'/images/', $name);
        //     return $name;
        // }
        //Se soluciona como esta abajo

        //Reglas de validacion // ahora la logica de validacion quedo en el StoreTrainerRequest, y la logica de almacenamiento en el metodo store
        $validatedData = $request->validate([
            'name' => 'required|max: 10',
            'avatar' => 'required|image',
            'slug' => 'required',
            'description' => 'required',
        ]);

        $trainer = new Trainer();
        $file = $request->file('avatar');
        if ($file != "") {
            $name = time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
            }
            else{
                $name = "Sin Imagen.jpg";
                }
        // return $name; //Ver nombre archivo
        $trainer->name = $request->input('name');
        $trainer->avatar = $name;
        $trainer->description = $request->input('description');
        $trainer->slug = $request->input('slug');
        $trainer->save();

        // return 'Saved';
        return redirect()->route('trainers.index');
    }






    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

///////////////////////////////////////////////////////////////////////
//////antes de hacerse con el slug puede hacerse asi con id ///////////
    // 1
    // public function show($id)
    // {
    //     $trainer = Trainer::find($id);
    //     return view('trainers.show',compact('trainer'));
    // }
    // 1.1
    // public function show(Trainer $trainer) //implicit binding
    // {
    //     return view('trainers.show',compact('trainer'));
    // }

 ///////////////////////////////////////////////////////////////////////   
/////// usando slug quedaria asi, para no usar ids en las url //////////
    // 2
    // public function show($slug)
    //     $trainer = Trainer::where('slug','=',$slug)->firstOrFail();
    //     return view('trainers.show',compact('trainer'));
    // }

///////////////////////////////////////////////////////////////////////   
/////Dejamos de usar el implicit binding cuando creamos el slug, pero laravel da una forma de customizar 
///// el implicit binding agregando una funcion al modelo y poder usarlo con el slug, quedaaria asi:
    // 3
    public function show(Trainer $trainer) //implicit binding
    {
        return view('trainers.show',compact('trainer'));
    }






    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Trainer $trainer)
    {
        return view('trainers.edit',compact('trainer'));
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trainer $trainer)
    {
        // return $trainer;
        //return $request;
        //$trainer->fill($request->all()); //fill() se encarga de actualizar todos los datos que estmos recibiendo
        $trainer->fill($request->except('avatar')); //actualiza datos menos el que indicamos

        $file = $request->file('avatar');
        if ($file != "") {
            $file_path = public_path() . "/images/$trainer->avatar";
            \File::delete($file_path); //borramos el archivo anterior al que vamos a cargar, para que no se acumule basura

            $name = time().$file->getClientOriginalName();
            $trainer->avatar = $name;
            $file->move(public_path().'/images/', $name);
            }
            else{
                $name = "Sin Imagen.jpg";
                }    

        $trainer->save(); //almacenamos los cambios
        
        // return 'updated';
        return redirect()->route('trainers.show',[$trainer])->with('status','Entrenador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trainer $trainer)
    {
        $file_path = \public_path().'/images/'.$trainer->avatar;
        $trainer->delete();
        // return 'deleted';
        return redirect()->route('trainers.index');
    }
}
