<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB,Hash;
use  Carbon\Carbon;
use Redirect;
use Session,Input;
use Validator;
use Yajra\Datatables\Facades\Datatables;
use App\User;
class UserController extends Controller
{
    //
    public function admin_index(){
    	return view('admin.users.create');
    }
    public function add(Request $request)
    {
    	$data= $request->all();
    	$email = implode("", $request->only('email'));
    	DB::beginTransaction();
    	try {
    		$save = array(
    			'name'      =>$data['title'],
    			'email'		=>$email,
    			'password'	=>Hash::make($data['password']),
    			'phone'		=>$data['phone'],
    			'address'	=>$data['address'],
    			'role'		=>$data['role'],
    			'created_at'	=>	Carbon::now(),
				'updated_at'	=>	Carbon::now(),
    			);
    		DB::table( 'users')->insert($save);
    		DB::commit();
    		
    	} catch (Exception $e) {
    		DB::rollback();
    	}
    	Session::flash('success','Success');

    	return Redirect::back(); 

    }
    public function check_email()
    {
    	if(!empty($_POST["email"])) {
    		$connection = mysqli_connect('localhost', 'root', '', 'seaculture_association');
    		$result = mysqli_query($connection,"SELECT count(*) FROM users WHERE email='" . $_POST["email"] . "'");
    		$row = mysqli_fetch_row($result);
    		$user_count = $row[0];
    		if($user_count>0) {
    			echo '<span id="email_result" style="color:red;font-size:17px;font-weight: 600" > Email đã tồn tại</span>';
    		}
    	}
    }
    public function list_users()
    {
    	return view('admin.users.list');
    }
    public function get_user_data(){
           $users = User::select(['id', 'name', 'email', 'role','created_at'])
                ->where('is_active',1)
                ->whereIn('role',['user','collaborator','admin']);
           return Datatables::of($users)
           ->editColumn('created_at', function ($user) {
            return $user->created_at->format('d/m/Y H:i');
        })
           ->filterColumn('created_at', function ($query, $keyword) {
            $query->whereRaw("DATE_FORMAT(created_at,'%Y/%m/%d %H:%i') like ?", ["%$keyword%"]);
        })
           ->make(true);
    }
    public function get_detail(Request $request){
        $id = $request->id;
        if(isset($id)){
            $data = User::where('id',$id)->get(['id','name','created_at'])->first();
            $data['created_at'] = isset($data['created_at'])?User::where('id',$data['created_at'])->first():null;

            return $data;
        }
    }
    public function delete($id){
        DB::beginTransaction();
        try {
             $user = User::where('id',$id)->first();
            if(!is_null($user)){
                 $user->delete();
            }
             DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return 0;
        }
        return 1;
    }
    public function edit($id){
        $user = User::where('id',$id)->select('name','avatar','email','phone','role','address')->first();
        return view('admin.users.edit',compact('user',$user));

    }
    public function update(Request $request,$id){
        
        $data = $request->all();
         // unset($data['_token']);
        $file = isset($data['file'])?$data['file']:null;
        $old_data = User::where('id',$id)->select('avatar')->first();
        $current_file_name = isset($old_data)?$old_data['avatar']:null;
        $path = public_path()."/images/users/";
        // dd($current_file_name);
        if(isset($file)){
            $filename = $id.'_'.time();
            $extension = $file->getClientOriginalExtension();
            $new_file = $filename.'.'.$extension;
            $file->move($path,$new_file);

        }else $new_file =null;

        $data['avatar'] = "images/users/".$new_file;
        $data['name'] = $data['title'];
        // $data['password'] = Hash::make($data['password']);
        if ($data['password']) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }
       
        unset($data['title']);
        unset($data['file']);
        unset($data['_token']);
       
        DB::beginTransaction();
        try {
           User::where('id',$id)->update($data);
            DB::commit();
            if(file_exists($path."/".$current_file_name && $old_data['avatar'])){
                unlink($path."/".$current_file_name);
            }
        Session::flash('success','Success');
        } catch (Exception $e) {
            DB::rollback();
            if (file_exists($path."/".$new_file )) {
                unlink($path."/".$new_file);
            }
            Session::flash('error',"Error");
        }
         return Redirect::back();

    }

}
