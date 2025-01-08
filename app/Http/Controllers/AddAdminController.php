<?php

namespace App\Http\Controllers;

use App\Mail\addAdminMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AddAdminController extends Controller
{
    //
    public function AddAdmin(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
        ]);
        $randomPassword = Str::random(8);

        $addAdmin = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($randomPassword)
        ]);

        Mail::to($request->email)->send(new addAdminMail($randomPassword));


        return back()->with("success", "Admin has been added successfully!");
    }
}
