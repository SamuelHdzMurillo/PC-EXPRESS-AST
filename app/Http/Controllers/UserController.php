<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Método para obtener todos los usuarios
    public function index()
    {
        $users = User::all();
        return response()->json(['message' => 'All users retrieved', 'data' => $users]);
    }

    // Método para mostrar un usuario específico por su ID
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json(['message' => 'User retrieved', 'data' => $user]);
    }

    // Método para almacenar un nuevo usuario en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Crear un nuevo usuario con los datos proporcionados
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return response()->json(['message' => 'User created'], 201); // Devuelve un mensaje indicando que el usuario ha sido creado
    }

    // Método para actualizar los datos de un usuario existente
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Validación de los datos del formulario para la actualización
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required|min:6',
        ]);

        // Actualizar los campos del usuario con los nuevos datos proporcionados
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json(['message' => 'User updated', 'data' => $user]); // Devuelve un mensaje indicando que el usuario ha sido actualizado
    }

    // Método para eliminar un usuario específico por su ID
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete(); // Eliminar el usuario

        return response()->json(['message' => 'User deleted']); // Devuelve un mensaje indicando que el usuario ha sido eliminado
    }
}
