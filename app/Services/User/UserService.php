<?php

namespace App\Services\User;

use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function userStatus($id)
    {
        $user = $this->userRepository->edit($id);

        $user->status = $user->status === 1 ? 0 : 1;

        $user->save();
    }
}
