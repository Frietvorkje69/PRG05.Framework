<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{
    use HandlesAuthorization;

    public function before(User $user){
        if($user->admin_status === 1){
            return Response::allow();
        }
    }


    public function viewAny(User $user): Response
    {
        return Response::allow();
    }


    public function view(User $user): Response
    {
        return Response::allow();
    }


    public function create(User $user): Response
    {
        return Response::denyWithStatus(404);
    }


    public function update(User $user): Response
    {
        return Response::denyWithStatus(404);
    }


    public function delete(User $user): Response
    {
        return Response::denyWithStatus(404);
    }


    public function restore(User $user): Response
    {
        return Response::denyWithStatus(404);
    }


    public function forceDelete(User $user): Response
    {
        return Response::denyWithStatus(404);
    }
}
