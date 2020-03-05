<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Repositories\UserCrud\UserRepositoryInterface;

class UserController extends Controller
{

    public $successStatus = 200;
    
    /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function register(Request $request) 
    { 
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'role' => 'required|max:10', 
            'number' => 'required|numeric',
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
       if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
        $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('MyApp')-> accessToken; 
        $success['name'] =  $user->name;
return response()->json(['success'=>$success], $this-> successStatus); 
    }

     /** 
     * details api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function details() 
    { 
        $user = Auth::user(); 
        return response()->json(['success' => $user], $this-> successStatus); 
    } 
    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */ 
    public function login(){ 
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){ 
            $user = Auth::user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            return response()->json(['success' => $success], $this-> successStatus); 
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'], 401); 
        } 
    }

    private $user;
    public function __construct(UserRepositoryInterface $users)
    {
      $this->user=$users;
    }
    public function getAllUsers()
    {
      return $this->user->getAll();
    }
    public function updateById(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [ 
            'name' => 'required',
            'role' => 'required|max:10', 
            'number' => 'required|numeric|numeric',
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);
        if ($validator->fails()) { 
            return response()->json(['error'=>$validator->errors()], 401);            
        }
       $attribute = [
        'name'=>$request->input('name'),
        'role'=> $request->input('role'),
        'number' => $request->input('number'),
        'email'=>$request->input('email'),
        'password'=> bcrypt($request->input('password')),
        'c_password' => bcrypt($request->input('c_password'))
      ];
      print_r($attribute);
      
      return $this->user->update($attribute,$id);
    }
    public function destroy($id)
    {
        return $this->user->delete($id);
    }
    public function show($id)
    {
        return $this->user->show($id);
    }
  }
  
