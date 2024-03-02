<?php


namespace App\Http\Controllers;

//use App\User;
use App\Models\User; // <-- your model
use Illuminate\Http\Response;
use App\Traits\ApiResponser; // <-- use to standardized our code for apt response 
use Illuminate\Http\Request; // <-- nandling http request in lumen
use DB; // <-- if your not using lumen eloquent you can use DB component in lumen

Class UserController extends Controller {
    use ApiResponser;

    private $request;

    public function __construct (Request $request) {
        $this->request = $request;
    }

    public function getUsers(){
        
        // eloquent style
        // $users = User::all();

        // sql string as parameter
        $users = DB::connection('mysql') 
        ->select("Select * from tbl_user");
        
        //return response()->json($users, 200);
        return $this->successResponse($users);
    }
    /**
    * Return the list of users
    * @return Illuminate\Http\Response
    */
    public function index()
    {
        $users = User::all();

        // return Susers; // <-- not standardized return of data 
        // return $this->successResponse(Susens):
        //return response()->json($users, 200);
        return $this->successResponse($users);
    }

    public function add(Request $request ){
        $rules = [
        'username' => 'required|max:20',
        'password' => 'required|max:20',
        'gender' => 'required|in:Male,Female',
        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());
        
        return $this->successResponse($user, Response::HTTP_CREATED);
    }
}