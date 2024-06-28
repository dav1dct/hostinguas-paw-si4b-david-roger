<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function register(Request $request)
    {
    $validate = $request->validate([
        'name'  => 'required',
        'email' => 'required|email',
        'password'  => 'required',
        'password_confirmation' => 'required|same:password',
        'role' => 'required'
    ]);

    $validate['password'] = bcrypt($request->password);

    $user = User::create($validate);
    $success['token'] = $user->createToken('velg')->plainTextToken;
    $success['name'] = $user->name;

    return response()->json($success, Response::HTTP_CREATED);
    }
    public function login(Request $request)
    {
        if(Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('velg')->plainTextToken;
            $success['name'] = $user->name;
            return response()->json($success, 201);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }
}
