<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\User;
use App\Rules\MatchOldPassword;
use Hash;
use Carbon\Carbon;
use Spatie\Activitylog\Models\Activity;
class CustomerController extends Controller
{
    public function login()
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == 'raghu' && $password == '12345'){
            $data = array('status' => 200,
                'msg' => 'Login Success',
                'token' =>'1234');
            echo json_encode($data);
        }
    }

    public function category(){
        $data=Customer::getAllCategory();

        if(count($data)<=0){
            return response()->json(['status'=>false,'msg'=>'','data'=>null]);
        }
        else{
            return response()->json(['status'=>true,'msg'=>'','data'=>$data]);
        }
        
    }

    public function product(){
        $data=Customer::getAllProduct();

        if(count($data)<=0){
            return response()->json(['status'=>false,'msg'=>'','data'=>null]);
        }
        else{
            return response()->json(['status'=>true,'msg'=>'','data'=>$data]);
        }
        
    }

    public function register(Request $request)
    {
        //Validate data
        $data = $request->only('customerName', 'customerEmailid', 'customerPassword');
         return response()->json(['status'=>false,'msg'=>'','data'=>$request]);
        $this->validate($request,[
            'customerName' => 'required|string',
            'customerEmailid' => 'required|email|unique:users',
            'customerMobile' => 'required|min:10',
            'customerPassword' => 'required|string|min:6|max:50',
            'customerConfirmpassword' => 'required|string|min:6|max:50',            
        ]);

        //Send failed response if request is not valid
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->messages()], 200);
        // }

        if ($request->customerPassword != $request->customerConfirmpassword) {
            return response()->json(['error' => $validator->messages()], 200);
        }

        //Request is valid, create new user
        $user = User::create([
            'name' => $request->customerName,
            'email' => $request->customerEmailid,
            'password' => bcrypt($request->customerPassword)
        ]);

        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user,
        ], Response::HTTP_OK);
    }

}
