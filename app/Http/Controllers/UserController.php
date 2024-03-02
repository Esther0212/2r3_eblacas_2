<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;

Class UserController extends Controller {
    private $request;
    public function __construct(Request $request){
    $this->request = $request;
    }

public function getUsers(){
    $users = User::all();
    // return response()->json($users, 200);
    return response()->json(['data' => $users], 200);

    // eloquent style
    // $users = User::all();

    // sql string as parameter
    // $users = DB::connection('mysql')
    // ->select("Select * from tbl_user where userid <= 3");

    // return response()->json($users, 200);
    // return response()->json(['data' => $users, 'site' => 1], 200); 
    // return response()->json(['data' => $users], 200);
    // return $this->successResponse($users);

    }
}