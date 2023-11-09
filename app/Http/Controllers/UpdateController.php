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
         $request->validate([
            'title' => 'required',
            'description' => 'required',
            'images' => 'required|array',
            'device_id' => 'required|exists:devices,id',
        ]);

        $update = new Update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'images' => $request->input('images'),
            'device_id' => $request->input('device_id'),
        ]);

        $update->save();

        return redirect()->route('updates.index')->with('success', 'Update creado correctamente.');
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