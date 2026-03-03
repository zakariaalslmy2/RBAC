<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PermeissionsResource;

class PermeissionsController extends Controller
{
      public function index()
    {
        return response()->json( PermeissionsResource::collection(Permission::all()));

    }
}
