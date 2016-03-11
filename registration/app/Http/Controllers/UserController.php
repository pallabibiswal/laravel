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
use App\Http\Requests\UserDataRequest;

class UserController extends Controller
{
     /**
     * Create a method to get profile view.
     *
     * @param  object $request
     * @return view profile
     */
    public function getProfile(Request $request)
    {
        //displaying information of authenticated user
        $user = new User;
        $data = Auth::user();
        
        return response()->view('profile',compact('data'));
    }

     /**
     * Create a method to get update view
     *
     * @param  object $request
     * @return view update
     */
    public function getUpdate(Request $request)
    {    
        //displaying information of authenticated user
        $user = new User;
        $data = Auth::user();
        return response()->view('update',compact('data')); 
    }
    
     /**
     * Create a method to update data
     *
     * @param  object $request
     * @return view profile
     */
    public function postUpdate(UserDataRequest $request)
    {
        $value = Auth::user()->id;

        // validating email and username
        $this->validate($request, [
        'email'   => 'bail|required|email|unique:users,email,'.$value,
        'username'=> 'bail|required|unique:users,username,'.$value,
        ]);

        //storing all request in an array
        $data = $request->all();

         //uploading updated profile picture
        if ($request->file('photo')) {
            $image_temp_name = $request->file('photo')->getPathname();
            $image_name =$request->file('photo')->getClientOriginalName();
            $image_name .= $data['username'];
            $path = base_path() . '/public/profilepic/'; 
            $request->file('photo')->move($path , $image_name);
        } else {
            $image_name = DB::table('users')->where('id', $value)->value('photo');
        }     

        //storing unique image name to array
        $data['photo'] = $image_name;
        
        //calling method to update user informations
        $user = new User;
        $user->updateUserData($data,$value);
        
        $data = User::where('id', $value)->first();
        return view('profile',compact('data'));
    }
    
}
