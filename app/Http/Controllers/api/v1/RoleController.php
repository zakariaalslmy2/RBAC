<?php

namespace App\Http\Controllers\api\v1;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Http\Requests\api\v1\Role\StoreRoleRequest;
use App\Http\Requests\api\v1\Role\UpdateRoleRequest;

class RoleController extends Controller
{
     public function index()
    {
        return response()->json(data: RoleResource::collection(Role::all()));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        $data= $request->validated();
        $user= Role::create(  $data);

        return response()->json([
            "message"=>"create role succsessful",
            "user" =>RoleResource::make($user)
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Role $user)
    {
        return response()->json(RoleResource::make($user));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {

        $user= Role::update( $request->validated());

        return response()->json([
            "message"=>"update role succsessful",
            "user" =>RoleResource::make($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Role $user)
    {
   $user->delete();
   return response()->json([

    'massege' => 'delet Role succsessful',
   ]);
    }
}