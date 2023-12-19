<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Auth;
use Symfony\Component\Security\Csrf\CsrfToken;
use Symfony\Component\Security\Csrf\CsrfTokenManagerInterface;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        // if($request->user()){
        //     $user = User::all();
        //     // return view('Auth.dashboard_userlist',['displayData'=> $user]);
        //     return response()->json(['UserData' => $user]);

        // }


        $user = User::all();
        return response()->json(['UserData' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            "name"=> $request->name,
            "email"=> $request->email,
            "password"=> Hash::make($request->password),
        ]);

        return response()->json(['success' => $request->all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user || !Hash::check($request->password, $user->password)){
            return response([
                'message'=>'Credentials are incorrect!'
            ],401);
        }
            $token = $user->createToken('userToken'."=>".$request->email)->plainTextToken;
            return response([
                'user' => $user,
                'token' => $token
            ],201);
    }
    /**
     * Remove the specified resource from storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $authorizationHeader = $request->header('Authorization');
        return response([
            'message'=> $authorizationHeader,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


}
