<?php

namespace App\Http\Controllers;

use App\Models\owner;
use App\Http\Resources\CatalogResource;


class CatalogController extends Controller
{

    public function ownersSelect()
    {
        $owner = owner::all();
        return CatalogResource::collection($owner);
    }

}