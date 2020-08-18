<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function getProfiles()
    {
        return User::all();
        //return view("profile", User::all());
    }
}
