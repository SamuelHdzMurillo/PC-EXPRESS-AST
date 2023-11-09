<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Update;
use App\Models\device;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Display a listing of the updates.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $updates = Update::with('device')->get();
        return response()->json($updates);
    }

    /**
     * Store a newly created update in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    // Valida y almacena los datos enviados desde el formulario
    $update = new Update();
    
    $deviceExists = Device::where('id', $request->device_id)->exists();

    if (!$deviceExists) {
        return response()->json(['error' => 'El device_id no existe en la tabla devices.'], 422);
    }
    
    $update->title = $request->title;
    $update->description = $request->description;
    $update->device_id = $request->device_id;

    $images = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imagePath = $image->store('images', 'public');
            $images[] = $imagePath;
        }
    }
    
    $update->images = $images;

    $update->save();

    return [
        'message' => 'Se agregó una actualizacion',
        'imageUrl' => $update->images ? asset('storage/' . $update->images) : null
    ];
}


    /**
     * Display the specified update.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show(Update $update)
    {
        $update->load('device');
        return response()->json($update);
    }

    /**
     * Update the specified update in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Update $update)
    {
        $request->validate([
            'description' => 'required',
            'images' => 'array',
            'device_id' => 'required|exists:devices,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $update->description = $request->description;
        $update->device_id = $request->device_id;
        $update->save();

        if ($request->hasFile('images')) {
            // Delete old images
            $this->deleteImages($update);

            $images = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('public/images');
                $images[] = [
                    'url' => Storage::url($path),
                    'path' => $path,
                ];
            }
            $update->images = $images;
            $update->save();
        }

        return response()->json(['message' => 'Update updated successfully']);
    }

    /**
     * Remove the specified update from the database.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy(Update $update)
    {
        // Delete images
        $this->deleteImages($update);

        $update->delete();

        return response()->json(['message' => 'Update deleted successfully']);
    }

    /**
     * Delete the images associated with an update.
     *
     * @param  \App\Models\Update  $update
     * @return void
     */
    protected function deleteImages(Update $update)
    {
        foreach ($update->images as $image) {
            Storage::delete($image['path']);
        }
    }
}