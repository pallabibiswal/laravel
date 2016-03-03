<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Model\Role;
use App\Model\Privilege;
use App\Model\Resource;
use App\Model\Operation;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use DB;
use Session;
use Redirect;
use Twitter;

class UserController extends Controller
{
     /**
     * Create a method to get profile view.
     *
     * @param  object $request
     */
    public function getProfile(Request $request)
    {
        
      if(Auth::check()) {
            $user = new User;
            $data = Auth::user();
             return response()->view('profile',compact('data'));
         } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
         }
       
    }

     /**
     * Create a method to get update view
     *
     * @param  object $request
     */
    public function getUpdate(Request $request)
    {
        
      if(Auth::check()) {
            $user = new User;
            $data = Auth::user();
            return response()->view('update',compact('data'));
         } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
         }   
    }
    
     /**
     * Create a method to update data
     *
     * @param  object $request
     */
    public function postUpdate(Request $request)
    {

      if(Auth::check()) {             
           $value = Auth::user()->value('id');
           
            $this->validate($request, [
             'first'   => 'bail|required|max:30|min:3|alpha',
             'last'    => 'bail|required|max:30|min:3|alpha',
             'middle'  => 'bail|max:30|min:3|alpha',
             'suffix'  => 'bail|max:30|min:3|alpha',
             'employer'=> 'bail|max:30|min:3|alpha',
             'dob'     => 'bail|required|date',
             'email'   => 'bail|required|email|',
             'rstreet' => 'bail|required|max:30|min:3',
             'rcity'   => 'bail|required|max:30|min:3|alpha',
             'rstate'  => 'bail|required|max:30|min:3|alpha',
             'rphone'  => 'bail|required|numeric',
             'ostreet' => 'bail|required|max:30|min:3',
             'ocity'   => 'bail|required|max:30|min:3|alpha',
             'ostate'  => 'bail|required|max:30|min:3|alpha',
             'ophone'  => 'bail|required|numeric',
             'username'=> 'bail|required',
             'photo'   => 'image',
            ]);
            
          if ($request->file('photo')) {
            $image_temp_name = $request->file('photo')->getPathname();
            $image_name =$request->file('photo')->getClientOriginalName();
            $path = base_path() . '/public/profilepic/'; 
            $request->file('photo')->move($path , $image_name);
          } else {
           $image_name = DB::table('users')->where('id', $value)->value('photo');
          }     

          //validating updated data
           $data = DB::table('users')
           	->where('id', $value)
           	->update(['first'       => $request->input('first'),
                     'last'        => $request->input('last'),
                     'middle'      => $request->input('middle'),
                     'suffix'      => $request->input('suffix'),   
                     'employement' => $request->input('employement'),
                     'employer'    => $request->input('employer'),
                     'dob'         => $request->input('dob'),
                     'gender'      => $request->input('gender'),
                     'status'      => $request->input('status'),
                     'rstreet'     => $request->input('rstreet'),
                     'rcity'       => $request->input('rcity'),
                     'rstate'      => $request->input('rstate'),
                     'rphone'      => $request->input('rphone'),
                     'ostreet'     => $request->input('ostreet'),
                     'ocity'       => $request->input('ocity'),
                     'ostate'      => $request->input('ostate'),
                     'ophone'      => $request->input('ophone'),
                     'photo'       => $image_name,
                     'username'    => $request->input('username'),
                     'tweet'       => $request->input('tweet'),
                     'extra'       => $request->input('extra')
            ]);
            $data = DB::table('users')->where('id', $value)->first();
            return view('profile',compact('data'));
      } else {
	        \Session::flash('status', 'Please login!');
	        return redirect('login');
        }  
    }
    
}
