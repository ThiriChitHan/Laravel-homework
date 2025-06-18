<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\PermissionRequest;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PermissionResource;
use App\Http\Controllers\API\BaseController;
use App\Repositories\Permission\permissionRepositoryInterface;
use Faker\Provider\Base;

class PermissionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    protected $permissionRepository;
    public function __construct(permissionRepositoryInterface $permissionRepository)
    {
        $this->permissionRepository = $permissionRepository;
    }
    public function index()
    {
        $permissions = $this->permissionRepository->index();
        $data = PermissionResource::collection($permissions);
        return $this->success($data, "Permissions Retrieved Successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validation = Validator::make($request->all(), [
            'name' => 'required',
        ]);
         $permissions = $this->permissionRepository->store([
             'name' => $request->name,
        ]);

        if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
        }
        
        return $this->success($permissions, "Permissions Created Successfully", 200);
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


        $permissions = $this->permissionRepository->edit($id);
        $permissions->update($request->all());
        return $this->success($permissions, "Permissions Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permissions = $this->permissionRepository->edit($id);
        $permissions->delete();
        return  $this->success(null, "Delete Successfully", 200);
    }
}
