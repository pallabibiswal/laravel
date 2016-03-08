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

class RegistrationController extends Controller
{
/**
 * Store a new registration post.
 *
 * @param  Request  $request
 * @return view login
 */
   public function registrationPost(Request $request) 
   {
        
        // validating user data
        // $this->validate($request, [
        //     'first'   => 'bail|required|max:30|min:3|alpha',
        //     'last'    => 'bail|required|max:30|min:3|alpha',
        //     'middle'  => 'bail|max:30|min:3|alpha',
        //     'suffix'  => 'bail|max:30|min:3|alpha',
        //     'employer'=> 'bail|max:30|min:3|alpha',
        //     'dob'     => 'bail|required|date',
        //     'email'   => 'bail|required|email|unique:users,email',
        //     'rstreet' => 'bail|required|max:30|min:3',
        //     'rcity'   => 'bail|required|max:30|min:3|alpha',
        //     'rstate'  => 'bail|required|max:30|min:3|alpha',
        //     'rphone'  => 'bail|required|numeric',
        //     'ostreet' => 'bail|required|max:30|min:3',
        //     'ocity'   => 'bail|required|max:30|min:3|alpha',
        //     'ostate'  => 'bail|required|max:30|min:3|alpha',
        //     'ophone'  => 'bail|required|numeric',
        //     'password'=> 'bail|required|max:30|min:6',
        //     'username'=> 'bail|required|unique:users,username',
        //     'repassword' => 'bail|required|same:password',
        //     'photo'   => 'image',
        //  ]);
        
        //storing user information in an array
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
        $data['password']   = bcrypt($request->input('password'));
        $data['username']   = $request->input('username');
        $data['repassword'] = $request->input('repassword');
        $data['tweet']      = $request->input('tweet');   
        $data['extra']      = $request->input('extra');

        //upload files
        if ($request->file('photo')) {
            $image_temp_name = $request->file('photo')->getPathname();
            $image_name =$request->file('photo')->getClientOriginalName();
            $path = base_path() . '/public/profilepic/'; 
            $request->file('photo')->move($path , $image_name);
            $data['photo'] =  $image_name;
        } else {
            $data['photo'] = '';
        }  
        
        //calling method to save user information
        $user = new User;          
        $user->registeredData($data);
       
        //fetching user id 
        $value = DB::table('users')->where('email', Input::get('email'))->value('id');

        $data = [
           'id' => $value,
           'key'=> str_random(30),
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
    *@return view login
    */
    public function confirm($id,$key) {
    
        if( ! $id) {
            return redirect('register');
        }
        //activating registered user
        $user = User::find($id);
        $user->activate = 1;
        $user->key = $key;
        $user->save();

       \Session::flash('status','You have successfully verified your account.');
        return redirect('login');
    }
}
