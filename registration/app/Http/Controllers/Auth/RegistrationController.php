<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;
use Session;
use Mail;
use DB;
use Redirect;
use Illuminate\Support\Facades\Input;

/**
 * Create a new controller instance.
 *
 * @return void
 */
 function __construct()
{
    $this->middleware('auth');
}

/**
 * Store a new registration post.
 *
 * @param  Request  $request
 * @return Response
 */
class RegistrationController extends Controller
{
   public function registrationPost(Request $request) {

   		$this->validate($request, [
            'first'   => 'bail|required|max:30|min:3|alpha',
            'last'    => 'bail|required|max:30|min:3|alpha',
            'middle'  => 'bail|max:30|min:3|alpha',
            'suffix'  => 'bail|max:30|min:3|alpha',
            'employer'=> 'bail|max:30|min:3|alpha',
            'dob'     => 'bail|required|date',
            'email'   => 'bail|required|email|unique:users,email',
            'rstreet' => 'bail|required|max:30|min:3',
            'rcity'   => 'bail|required|max:30|min:3|alpha',
            'rstate'  => 'bail|required|max:30|min:3|alpha',
            'rphone'  => 'bail|required|numeric',
            'ostreet' => 'bail|required|max:30|min:3',
            'ocity'   => 'bail|required|max:30|min:3|alpha',
            'ostate'  => 'bail|required|max:30|min:3|alpha',
            'ophone'  => 'bail|required|numeric',
            'password'=> 'bail|required|max:30|min:6',
            'username'=> 'bail|required|unique:users,username',
            'repassword' => 'bail|required|same:password',
            'photo'   => 'image',
   		 ]);

        $user = new User;

        $user->first       = $request->input('first');
        $user->last        = $request->input('last');
        $user->middle      = $request->input('middle');
        $user->suffix      = $request->input('suffix');
        $user->employement = $request->input('employement');
        $user->employer    = $request->input('employer');
        $user->dob         = $request->input('dob');
        $user->email       = $request->input('email');
        $user->gender      = $request->input('gender');
        $user->status      = $request->input('status');
        $user->rstreet     = $request->input('rstreet');
        $user->rcity       = $request->input('rcity');
        $user->rstate      = $request->input('rstate');
        $user->rphone      = $request->input('rphone');
        $user->ostreet     = $request->input('ostreet');
        $user->ocity       = $request->input('ocity');
        $user->ostate      = $request->input('ostate');
        $user->ophone      = $request->input('ophone');
        $user->password    = bcrypt($request->input('password'));
        $user->username    = $request->input('username');
        $user->repassword  = $request->input('repassword');
        $user->tweet       = $request->input('tweet');   
        $user->extra       = $request->input('extra');

      //upload files

        if ($request->file('photo')) {
            $image_temp_name = $request->file('photo')->getPathname();
            $image_name =$request->file('photo')->getClientOriginalName();
            $path = base_path() . '/public/profilepic/'; 
            $request->file('photo')->move($path , $image_name);
            $user->photo =  $image_name;
        } else {
            $user->photo = '';
        }			
        $user->save();

        $value = DB::table('users')->where('email', Input::get('email'))->value('id');
        $mail = $request->input('email');
   
        $data = [
           'id' => $value,
        ];

        //sending confirmation email

        Mail::send('verify', $data, function ($message) {
            $message->from('pallabi4321@gmail.com', 'Verify your email');
            $message->to(Input::get('email'))->subject('verify email to activate account');
        });

        \Session::flash('status', 'Please check your email to activate your account!');
        return redirect('login');
    }
    
    /**
    * method to activate a user after verification.
    *
    * @param  $id
    */
    public function confirm($id) {
    
        if( ! $id) {
            \Session::flash('status', 'Please provide correct email!');
            return redirect('register');
        }
        //activating registered user
        $user = User::find($id);
        $user->activate = 1;
        $user->save();

       \Session::flash('status','You have successfully verified your account.');
        return redirect('login');
    }
}
