<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsersData(){
        $data = User::all()->makeHidden(['created_at', 'updated_at']);

        return response()->json($data);
    }
}
