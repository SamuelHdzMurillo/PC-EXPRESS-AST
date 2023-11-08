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
        $query->orderBy('created_at'); // Reemplaza 'fecha' con el nombre de tu columna de fecha
    }])->get();
    

    // Iterar sobre los dispositivos y agregar la URL de la imagen a cada uno
    foreach ($devices as $device) {
        $device->imageUrl = $device->img ? asset('storage/' . $device->img) : null;
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
            $query->orderBy('created_at'); // Reemplaza 'fecha' con el nombre de tu columna de fecha
        }])
        ->find($id);

        if (!$device) {
            return response()->json(['message' => 'El dispositivo no existe'], 404);
        }

        $device->imageUrl = $device->img ? asset('storage/' . $device->img) : null;

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
