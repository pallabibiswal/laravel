<?php
/**
* File Doc Comment
*
* PHP version 5
*
* @category PHP
* @package  PHP_CodeSniffer
* @author   Mindfire Solutions <pallabi.biswal@mindfiresolutions.com>
* @license  http://www.gnu.org/copyleft/gpl.html GNU General Public License
* @link     http://www.mindfiresolutions.com
*/
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
     * @return view profile/login
     */
    public function getProfile(Request $request)
    {
        
        if(Auth::check()) {

            //displaying information of authenticated user
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
     * @return view update/login
     */
    public function getUpdate(Request $request)
    {    
        if(Auth::check()) {

            //displaying information of authenticated user
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
     * @return view profile/login
     */
    public function postUpdate(Request $request)
    {

        if(Auth::check()) {             
           $value = Auth::user()->id;

            //validating updated data
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
            
            //uploading updated profile picture
            if ($request->file('photo')) {
                $image_temp_name = $request->file('photo')->getPathname();
                $image_name =$request->file('photo')->getClientOriginalName();
                $path = base_path() . '/public/profilepic/'; 
                $request->file('photo')->move($path , $image_name);
            } else {
                $image_name = DB::table('users')->where('id', $value)->value('photo');
            }     

            $data['first']      = $request->input('first');
            $data['last']       = $request->input('last');
            $data['middle']     = $request->input('middle');
            $data['suffix']     = $request->input('suffix');
            $data['employement']= $request->input('employement');
            $data['employer']   = $request->input('employer');
            $data['dob']        = $request->input('dob');
            $data['email']      = $request->input('email');
            $data['gender']     = $request->input('gender');
            $data['status']     = $request->input('status');
            $data['rstreet']    = $request->input('rstreet');
            $data['rcity']      = $request->input('rcity');
            $data['rstate']     = $request->input('rstate');
            $data['rphone']     = $request->input('rphone');
            $data['ostreet']    = $request->input('ostreet');
            $data['ocity']      = $request->input('ocity');
            $data['ostate']     = $request->input('ostate');
            $data['ophone']     = $request->input('ophone');
            $data['photo']      = $image_name;
            $data['username']   = $request->input('username');
            $data['tweet']      = $request->input('tweet');   
            $data['extra']      = $request->input('extra');
            
            //calling method to update user informations
            $user = new User;
            $user->updateUserData($data,$value);
            
            $data = User::where('id', $value)->first();
            return view('profile',compact('data'));
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
        }  
    }
    
}
