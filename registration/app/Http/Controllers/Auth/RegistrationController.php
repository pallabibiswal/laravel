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

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserDataRequest;
use App\User;
use Hash;
use Auth;
use Session;
use Mail;
use DB;
use Twilio;
use Redirect;

class RegistrationController extends Controller
{
/**
 * Store a new registration post.
 *
 * @param  Request  $request
 * @return view login
 */
   public function registrationPost(UserDataRequest $request) 
   {
        
        // validating user data
        $this->validate($request, [
            'email'   => 'bail|required|email|unique:users,email',
            'password'=> 'bail|required|max:30|min:6',
            'username'=> 'bail|required|unique:users,username',
            'repassword' => 'bail|required|same:password',
        ]);
        
        //storing user information in an array
        $data = $request->all();

        //storing password in encrypted format 
        $data['password'] = bcrypt($request->input('password'));

        //upload files
        if ($request->file('photo')) {
            $image_temp_name = $request->file('photo')->getPathname();
            $image_name = $request->file('photo')->getClientOriginalName();
            $image_name .= $data['username'];
            $path = base_path() . '/public/profilepic/'; 
            $request->file('photo')->move($path , $image_name);
            $data['photo'] =  $image_name;
        } else {
            $data['photo'] = '';
        }  
        
        //calling method to save user information
        $user = new User;          
        $value = $user->registeredData($data);

        $data = [
           'id'   => $value,
           'key'  => str_random(30),
           'name' => $request->input('first'),
        ];

        //sending confirmation email
        Mail::send('auth/emails/verify', $data, function ($message) {
            $message->from('pallabi4321@gmail.com', 'Verify your email');
            $message->to(Input::get('email'))->subject('verify email to activate account');
        });

        //sending sms to check email
        Twilio::message('+91'.$request->input('rphone'), 
                    'Hello '.$request->input('first').
                    ' Please check your email<'.$request->input('email').
                    '> to activate your account!');

        \Session::flash('status', 'Please check your email to activate your account!');
        return redirect('login');
    }
    
    /**
    * method to activate a user after verification.
    *
    * @param  $id
    * @return view login
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
