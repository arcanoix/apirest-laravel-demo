<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with(['address'])->paginate(10);

        return UserResource::collection($users);
    }
}
