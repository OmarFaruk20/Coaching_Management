<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\validator;
use Symfony\Component\HttpFoundation\Response;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Carbon;

class UserRegistrationController extends Controller
{
    public function ShowRegistrationForm(){
        if(Auth::user()->role=='Admin'){
            return view('admin.user.register_form');
        }else{
            return back();
        }

    }

    public function SaveUser(Request $request){
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        // if ($response = $this->registered($request, $user)) {
        //     return $response;
        // }

        // return $request->wantsJson()
        //             ? new Response('', 201)
        //             : redirect($this->redirectPath());
        $users = User::all();
        return view('admin.user.user_list', ['users'=>$users]);
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'min:13', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'role' => $data['role'],
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function Userlist(){
        if(Auth::user()->role=='Admin'){
            $users = User::all();
            return view('admin.user.user_list', ['users'=>$users]);
        }else{
            return redirect('/home');
        }

    }

    public function user_profile($userId){
        $user = User::find($userId);
        return view('admin.user.profile',['user'=>$user]);
    }

    public function ChangeUserInfo($id){

        $user = User::find($id);
        return view('admin.user.change_user_info',['user'=>$user]);
    }

    public function UpdateUserInfo(Request $request){
        // dd($user);
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'mobile' => 'required|string|min:13|max:13',
            'email' => 'required|string|max:255|email',
        ]);
        $user = User::find($request->user_id);
        $user-> name = $request->name;
        $user-> mobile = $request->mobile;
        $user-> email = $request->email;

        $user->save();
        return redirect("/user_profile/$request->user_id")->with('message','Update Successfully');
    }

    public function ChangeUserAvatar($id){
        $user = User::find($id);
        return view('admin.user.change_user_avatar',['user'=>$user]);
    }

    public function UploadProfile(Request $request){
        $user = User::find($request->user_id);

        $file = $request->file('avatar');
        $ext = time().'.'.$file->getClientOriginalExtension();
        Image::make($file)->resize(400, 400)->save(public_path('/avatar/'.$ext));
        $user->avatar = $ext;
        $user->save();
        return redirect("/user_profile/$request->user_id")->with('message','Profile Picture Uploaded Successfully');
    }

    public function ChangePassword($id){
        $user = User::find($id);
        return view('admin.user.change_user_password', ['user'=>$user]);
    }

    public function UpdatePassword(Request $request){

        $this->validate($request,[
            'new_password' => 'required|string|min:8'
        ]);

        $oldpassword = $request->password;
        $user = User::find($request->user_id);

        if(Hash::check($oldpassword, $user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect("/user_profile/$request->user_id")->with('message','Password Uploaded Successfully');
        }else{
            return back()->with('error_message', 'Old Password Does Not Match!');
        }
    }
}
