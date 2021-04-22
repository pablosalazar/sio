<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function showProfile()
    {
    	$user = auth()->user();

    	return view('profile.show', compact('user'));
    }


    public function saveProfile()
    {
    	$user = auth()->user();

    	echo "estoy aca";
    }
}
