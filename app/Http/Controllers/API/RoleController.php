<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PermissionResource;
use App\Http\Controllers\API\BaseController;
use App\Repositories\Role\RoleRepositoryInterface;

class RoleController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    protected $roleRepository;
    public function __construct(RoleRepositoryInterface $roleRepository)
    {
        $this->roleRepository = $roleRepository;
    }
     
    public function index()
    {
       $roles = $this->roleRepository->index(); 
       $data = RoleResource::collection($roles);
       $roles = Role::with('permissions')->get();
       return $this->success($data, "Roles Retrieved Successfully", 200);  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
        ]);

       
        
        $roles = $this->roleRepository->store([
             'name' => $request->name,
        ]);

        if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
        }

        $roles->permissions()->sync($validation ["permissions"]);
        return $this->success($roles, "Roles Created Successfully", 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',

        ]);
         if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
    }
        $roles = $this->roleRepository->edit($id);
        $roles->update($request->all());
        return $this->success($roles, "Products Updated Successfully", 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $roles = $this->roleRepository->edit($id);
        $roles->delete();
        return  $this->success(null, "Delete Successfully", 200);
    }
}
