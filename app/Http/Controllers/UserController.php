<?php

namespace App\Http\Controllers;
use App\User;
use App\Field;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
 
    public function show($id)
    {
        return User::find($id);
    }

    public function rules()
    {
        return [
            'fname' => 'bail|required|max:255',
            'lname' => 'required|max:255',
            'password' => 'required',
            'email' => 'required|email',
            'type' => 'nullable',
            'last_4_digits' => 'required_if:type,1'
        ];
    }

    public function store(Request $request)
    {
        $rules = $this->rules();

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(['status'=>'error','message'=>$validator->errors()]);
        }else{
            $user = $this->create($request->all());
            if($user){
                return response()->json(['status'=>'success','message'=>'user has been created successfuly']);
            }else{
                return response()->json(['status'=>'error','message'=>'Error occured']);
            }
        }

    }

    protected function createDemoUser(array $data)
    {
       $return['demo_expiration_date'] = gmdate('Y-m-d H:i:s',strtotime('+7 days'));
       return $return;
    }

    protected function createLiveUser(array $data)
    {
       $return['last_4_digits'] = $data['last_4_digits'];
       return $return;
    }

    protected function create(array $data)
    {
        if(!isset($data['type'])) $data['type'] = 0;
        if(!$data['type']) $fields = $this->createDemoUser($data);
        else $fields = $this->createLiveUser($data);

        if($fields){
            $user =  User::create([
                'fname' => '',
                'lname' => $data['lname'],
                'email' => $data['email'],
                'type' => $data['type'],
                'password' => Hash::make($data['password'])
            ]);
            if($user->id > 0){
                $field = new Field();
                foreach($fields as $key => $value){
                    if($_field = $field->where('identifier',$key)->first())
                        $_field->users()->attach([$user->id => ['value' =>$value]]);
                }
            }
            return true;
        }
        return false;
    }


    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($user){
            $field = new Field();
            $values = array();
            //Very expensive method i will say, but maybe there is a better way to do that
            // i am not that familiar with this framework
            $fails = array();
            foreach($request->all() as $key => $value){
                $param = array('value' => $value);
                if($_field = $field->where('identifier',$key)->first()){
                    $user->fields()->updateExistingPivot($_field->id, $param);
                }else{
                    $fails[] = array('status'=>'error','message'=>'Field '.$key.' was not found');
                }
            }
            //Depends if you want to show fails to system admin that is trying to update users
            //Then i would iclude the fails param to show which field did a problem
            return response()->json(['status'=>'success','message'=>'User updated']);
        }else{
            return response()->json(['status'=>'error','message'=>'User not found']);
        }
    }

    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        if($user){
            $user->delete();
            return response()->json(['status'=>'success','message'=>'User deleted']);
        }
        return response()->json(['status'=>'success','message'=>'User was not found']);
    }
}
