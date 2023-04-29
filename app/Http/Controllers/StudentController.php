<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\User;
use App\Traits\ApiResponser;
use DB;

Class StudentController extends Controller {
    use ApiResponser;
    
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    public function getUsers(){    

        $users = DB::connection('mysql')    
        ->select("Select * from tblstudent");
        return $this->successResponse($users);
    }

    public function index(){

        $users = User::all();
        return $this->successResponse($users);
    }   

    public function add(Request $request){
        
        $rules = [
            'lastname' => 'required|max:20',
            'firstname' => 'required|max:20',
            'middlename' => 'required|max:20',

        ];

        $this->validate($request,$rules);

        $user = User::create($request->all());
        return $this->successResponse($user, Response::HTTP_CREATED);
    }

    public function show($id){
        
        $user = User::where('userid', $id)->first();
        if($user){
            return $this->successResponse($user);
        }
        {
            return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }
    }

    public function update(Request $request, $id) { 

        $rules = [
            'username' => 'required|max:20',
            'password' => 'required|max:20'
        ];
    
        $this->validate($request, $rules);
    
        $user = User::findOrFail($id);
    
        $user->fill($request->all());
    
        if ($user->isClean()) {
            return Response()->json("At least one value must change", Response::HTTP_UNPROCESSABLE_ENTITY);
        } else {
            $user->save();
            return $this->successResponse($user);
        }
    }

    public function delete($id) { 

        $user = User::findOrFail($id);
        $user->delete();
    
        return $this->successResponse($user);
    }
}