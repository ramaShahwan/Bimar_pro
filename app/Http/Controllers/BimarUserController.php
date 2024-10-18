<?php

namespace App\Http\Controllers;

use App\Models\Bimar_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
class BimarUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bimar_User $bimar_User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bimar_User $bimar_User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bimar_User $bimar_User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bimar_User $bimar_User)
    {
        //
    }
//     public function changePassword(Request $request)
//    {
//     $request->validate([
//         'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
//     ]);

//     $user = Auth::user();
//     $user->tr_user_pass = Hash::make($request->new_password);
//     $user->tr_user_passchangedate = now(); 
//     $user->save();

//     return redirect()->route('profile')->with('success', 'تم تغيير كلمة المرور بنجاح.');
//   }
}
