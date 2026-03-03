<?php

namespace App\Http\Controllers\api\v1;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\api\v1\user\StoreUserRequest;
use App\Http\Requests\api\v1\user\UpdateUserRequest;
use App\Http\Requests\api\v1\Role\AssinPermissionsRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(UserResource::collection(User::all()));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data= $request->validated();
        $user= User::create(  $data);

        return response()->json([
            "message"=>"create user succsessful",
            "user" =>UserResource::make($user)
        ]);

    }

    /**
     * Display the specified resource.
     */
    // public function show(User $user)
    // {
    //     return response()->json(UserResource::make($user));
    // }

    public function show($id)
{
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'message' => 'المستخدم غير موجود'
        ], 404);
    }

    return response()->json(new UserResource($user));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {

        $user= User::update( $request->validated());

        return response()->json([
            "message"=>"update user succsessful",
            "user" =>UserResource::make($user)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, User $user)
    {
        $user->delete();
        return response()->json([

            'massege' => 'delet user succsessful',
        ]);
    }

    public function assignPermissions(AssinPermissionsRequest $request, User $user){

        $permissions=$request->input('permissions',[]);

        $user->permissions()->Sync(  $permissions);

        return response()->json([
            "message"=>"permissions assign successfully",
            "user"=>UserResource::make($user->load('permissions'))

        ]);

    }


    public function removePermissions(AssinPermissionsRequest $request,User $user){

        $permissions=$request->input('permissions',[]);

        $user->permissions()->detach(  $permissions);

        return response()->json([
            "message"=>"permissions remove successfully",
               "user"=>UserResource::make($user->load('permissions'))

        ]);

    }


    
    public function assignRoles(AssinPermissionsRequest $request, User $user){

        $roles=$request->input('roles',[]);

        $user->permissions()->Sync( $roles);

        return response()->json([
            "message"=>"roles assign successfully",
            "user"=>UserResource::make($user->load('roles'))

        ]);

    }


    public function removeRoles(AssinPermissionsRequest $request,User $user){

        $roles=$request->input('roles',[]);

        $user->permissions()->detach(  $roles);

        return response()->json([
            "message"=>"permissions remove successfully",
               "user"=>UserResource::make($user->load('roles'))

        ]);

    }

}