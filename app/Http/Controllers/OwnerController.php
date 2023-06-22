<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\owner;

class OwnerController extends Controller
{
    //

    public function index()
    {
        $owners = Owner::with('devices')->get();
        return response()->json($owners);
    }
}
