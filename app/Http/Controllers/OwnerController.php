<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\owner;

class OwnerController extends Controller
{
    //
    // MOSTRAR A TODOS LOS PROPIETARIOS DE EQUIPOS
    public function index()
    {
        $owners = Owner::with('devices')->get();
        return response()->json($owners);
    }

    //ALMACENAR UN PROPIETARIO
    public function store(Request $request){
        $owner = new Owner();

    $owner->name = $request->name;
    $owner->phone_number = $request->phone_number;
    $owner->email = $request->email;

    $owner->save();

    return [
        'message' => 'Se agregó un propietario'
    ];

    }

    //VER A UN PROPIETARIO SELECIONADO
    public function show($id)
    {
    $owners = Owner::with('devices')->find($id);

    if (!$owners) {
        return response()->json(['message' => 'El propietario no existe'], 404);
    }

    return response()->json($owners);
}

// EDITAR UN PROPIETARIO
public function update(Request $request, $id)
{
    $owner = Owner::find($id);

    if (!$owner) {
        return response()->json(['message' => 'El propietario no existe'], 404);
    }

    $owner->name = $request->input('name', $owner->name);
    $owner->phone_number = $request->input('phone_number', $owner->phone_number);
    $owner->email = $request->input('email', $owner->email);

    $owner->save();

    return response()->json(['message' => 'Propietario actualizado correctamente']);
}
}
