<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        return view('pages.user.index');
    }

    /**
     * get All User
     */
    public function getAllUsers(){

        $users=User::all();
        $total=$users->count();
        $sl=1;
        foreach($users as $user){
            $user['sl']=$sl++;
        }
        return response()->json(['users'=>$users,'total'=>$total],200);
    }


    public function store(Request $request){
        $status='';
        if(is_null($request->id)){
            $validation=Validator::make(request()->all(),[

                'name'=>'required',
                'email'=>"required|email|unique:users,email",
                'phone'=>'required',
                'password'=>'required|min:4',
                'is_banned'=>'required',
                'role'=>'required'
            ]);
            if($validation->fails()){
                return response()->json(['errors'=>$validation->messages()],200);
            }
            if($dataSaveStatus = $this->create($request->all())->save()){
                $status.='Save successfully';
                return response()->json(['status'=>$status],200);
            };
            $status .='Saving failed';
            return response()->json(['status'=>$status],200);
        }
        $validation=Validator::make(request()->all(),[

            'name'=>'required',
            'email'=>"required|email|unique:users,email,".$request->id,
            'phone'=>'required',
            'is_banned'=>'required',
            'role'=>'required'
        ]);
        if($validation->fails()){
            return response()->json(['errors'=>$validation->messages()],200);
        }

        $user=User::find($request->get('id'));
        if($user){

            $updatestatus=$user->fill($request->all())->save();
            if($updatestatus){
                $status .='Update successfully';
                return response()->json(['status'=>$status],200);
            }
            $status .='Update failed';
            return response()->json(['status'=>$status],200);
        }
        $status .='User not found';
        return response()->json(['status'=>$status],200);
    }


    /**
     * @Delete User Data
     */
    public function deleteUser($id){
        $status='';
        if($user=User::find($id)){

            if($user->email===auth()->user()->email){
                $status .='you can not delete your own account';
                return response()->json(['status'=>$status],200);
            }
            if($del_status=$user->delete()){
                $status .= $user->name.' Deleted successfully';
                return response()->json(['status'=>$status],200);
            }
            $status .='Delete operation failed';
            return response()->json(['status'=>$status],200);
        }
        $status .='User not found for Delete operation';
        return response()->json(['status'=>$status],200);
    }


    /**
     * @param array $data
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'role' => $data['role'],
            'is_banned' => $data['is_banned'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
