<?php

namespace App\Http\Controllers\API;

use Faker\Provider\Base;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;
use App\Repositories\User\UserRepositoryInterface;

class UserController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    public function index()
    {
        $user = $this->userRepository ->index();
        $data = UserResource::collection($user);
        return $this->success($data, "User Retrieved Successfully", 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validation = Validator::make($request->all(), [ 
            'name' =>'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'status' => 'required',
            'role' => 'required',

         ]);
        //   $roles = Role::get();
         if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
        }
          $user = $this->userRepository->store([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status ? 1 : 0,
            'role' => $request->role,
        ]);
           $user->roles()->sync($request->roles ?? []);

         return $this->success($user, "User Created Successfully", 200);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = $this->userRepository->show($id);
        $data = new UserResource($user);

        return  $this->success($data, "User Show Successfully",200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $validation = Validator::make($request->all(), [ 
            'name' =>'required',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'status' => 'required',
            'role' => 'required',
         ]);
          if ($validation->fails()) {
            $this->error("Validation Error", $validation->errors(), 422);
        }
        $data = $validation->validated();
        $data['password'] = bcrypt($data['password']); 
        $user = $this->userRepository->store($data);

             if (!$user) {
        return $this->error("User not found", [], 404);
    }
        $user->update($request->all());
       $user->roles()->sync($request->input('roles'));

        return $this->success($user, "User Updated Successfully", 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = $this->userRepository->delete($id);
        if (!$user) {
        return $this->error("User not found", 404);
    }
        // $user->delete();
        return  $this->success(null, "Delete Successfully", 200);
    }
}
