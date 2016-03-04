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
use App\User;
use App\Model\Role;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Auth;
use DB;
use Session;
use Redirect;
use Twitter;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/profile';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => ['logout', 'profile']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
     /**
     * Create a method to login 
     *
     * @param  object $request
     * @return profile view
     */
    public function postlogin(Request $request)
    {

        $user = new User;
        $email = $request->input('email');
        $password = $request->input('password');
        $this->validate($request, [
        'email'    => 'bail|required|email',
        'password' => 'bail|required|min:6',
        ]);

        if (Auth::attempt(['email' => $email, 'password' => $password, 'activate' => 1])) {
            $data = DB::table('users')->where('email', $email)->first();
            return response()->view('profile',compact('data'));
        } else {
            \Session::flash('status', 'Please provide valid email and password!');
             return redirect('login');
        }
    }
     
}
