<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preuser;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displayData = Preuser::all();
        // json_encode($displayData);
        return response()->json($displayData);

        // return view('API.dashboard',['displayData'=>$displayData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('API.adduser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         if($request->id != null){
            $editData = Preuser::find($request->id);
            $editData->name = $request->name;
            $editData->email = $request->email;
            $editData->password = Hash::make($request->password);
            $editData->address = $request->address;
            $editData->type = 'user';
            $editData->save();
            $msg = "Data updated successfully!";
            }else{

                $insertData = new Preuser;
                $insertData->name = $request->name;
                $insertData->email = $request->email;
                $insertData->password = Hash::make($request->password);
                $insertData->address = $request->address;
                $insertData->type = 'user';
                $insertData->save();
                $msg = "Data registered successfully!";
            }

        return response()->json($msg, 201);

        // return response(['success' => $request->all()]);
    }


        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showData(Request $request)
    {
        // return response(['success' => $request->all()]);
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
        $editData = Preuser::find($id);
        return response()->json($editData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
            // $editData = Preuser::find($request->id);
            // $editData->name = $request->name;
            // $editData->email = $request->email;
            // $editData->password = Hash::make($request->password);
            // $editData->address = $request->address;
            // $editData->type = 'user';
            // $editData->save();
            // $msg = "Data updated successfully!";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Preuser::find($id)->delete();
        return response()->json("data Deleted successfully");
    }
}
