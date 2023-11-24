<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\device;

class DeviceController extends Controller
{
    // MOSTRAR TODOS LOS DISPOSITIVOS
    public function index()
{
    $devices = Device::with(['owner', 'updates' => function ($query) {
        $query->latest('id'); // Ordena las actualizaciones por ID de forma descendente
    }])
    ->orderBy('id', 'desc') // Ordena los dispositivos por ID de forma descendente
    ->get();

    // Iterar sobre los dispositivos y agregar la URL de la imagen a cada uno
    foreach ($devices as $device) {
        $device->imageUrl = $device->img ? asset('storage/' . $device->img) : null;

        // Iterar sobre las actualizaciones y agregar la URL de la imagen a cada una
        foreach ($device->updates as $update) {
            // Verificar si la propiedad 'images' es una cadena de texto
            if (is_string($update->images)) {
                $update->imgurl = asset('storage/' . $update->images);
            } else {
                // Si es un array, puedes manejarlo según tu lógica
                // En este caso, se deja el campo 'imgurl' como nulo
                $update->imgurl = null;
            }
        }
    }

    return response()->json($devices);
}




    // ALMACENAR UN DISPOSITIVO
    public function store(Request $request)
    {
        $device = new Device();

        $device->state = $request->state;
        $device->device_type = $request->device_type;
        $device->brand = $request->brand;
        $device->damage = $request->damage;
        $device->model = $request->model;
        $device->observations = $request->observations;

        $device->accesories = $request->accesories;

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $device->img = $imagePath;
        }

        $device->technican = $request->technican;
        $device->owner_id = $request->owner_id;

        $device->save();

        return [
            'message' => 'Se agregó un dispositivo',
            'imageUrl' => $device->img ? asset('storage/' . $device->img) : null
        ];
    }

    // VER UN DISPOSITIVO SELECCIONADO
    public function show($id)
{
    $device = Device::with(['owner', 'updates' => function ($query) {
        $query->orderBy('created_at');
    }])->find($id);

    if (!$device) {
        return response()->json(['message' => 'El dispositivo no existe'], 404);
    }

    // Agregar la URL de la imagen del dispositivo
    $device->imageUrl = $device->img ? asset('storage/' . $device->img) : null;

    // Agregar la URL de la imagen para cada actualización
    foreach ($device->updates as $update) {
        // Verificar si 'images' es una cadena de texto
        if (is_string($update->images)) {
            $update->imgurl = asset('storage/' . $update->images);
        } else {
            // Si 'images' no es una cadena de texto, asignar un valor nulo a 'imgurl'
            $update->imgurl = null;
        }
    }

    return response()->json($device);
}


    // EDITAR UN DISPOSITIVO
    public function update(Request $request, $id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        $device->state = $request->input('state', $device->state);
        $device->device_type = $request->input('device_type', $device->device_type);
        $device->brand = $request->input('brand', $device->brand);
        $device->damage = $request->input('damage', $device->damage);
        $device->accesories = $request->input('accesories', $device->accesories);

        $device->model = $request->input('model', $device->model);
        $device->observations = $request->input('observations', $device->observations);

        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('images', 'public');
            $device->img = $imagePath;
        }

        $device->technican = $request->input('technican', $device->technican);
        $device->owner_id = $request->input('owner_id', $device->owner_id);

        $device->save();

        return response()->json(['message' => 'Dispositivo actualizado correctamente', 'imageUrl' => $device->img ? asset('storage/' . $device->img) : null]);
    }

    // ELIMINAR UN DISPOSITIVO
    public function destroy($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        $device->delete();

        return response()->json(['message' => 'Dispositivo eliminado correctamente']);
    }
}
