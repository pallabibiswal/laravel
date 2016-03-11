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
namespace App;

use DB;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    /**
     * Create a method to check admin or not
     *
     * @return  admin column value
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * Create a method to save data of registered user
     *
     * @param  array $data
     * @return user id
     */
    public function registeredData($data) 
    {
        $user = new User;

        //store data in user instance
        $user->first       = $data['first'];
        $user->last        = $data['last'];
        $user->middle      = $data['middle'];
        $user->suffix      = $data['suffix'];
        $user->employement = $data['employement'];
        $user->employer    = $data['employer'];
        $user->dob         = $data['dob'];
        $user->email       = $data['email'];
        $user->gender      = $data['gender'];
        $user->status      = $data['status'];
        $user->rstreet     = $data['rstreet'];
        $user->rcity       = $data['rcity'];
        $user->rstate      = $data['rstate'];
        $user->rphone      = $data['rphone'];
        $user->ostreet     = $data['ostreet'];
        $user->ocity       = $data['ocity'];
        $user->ostate      = $data['ostate'];
        $user->ophone      = $data['ophone'];
        $user->password    = $data['password'];
        $user->username    = $data['username'];
        $user->repassword  = $data['repassword'];
        $user->tweet       = $data['tweet'];  
        $user->extra       = $data['extra'];
        $user->photo       = $data['photo'];
        

        //save user information in users table
        $user->save();

        //get registered users id
        $new_id = $user->id;
        return $new_id;
    }

    /**
     * Create a method to update data of registered user
     *
     * @param  array $data
     */
    public function updateUserData($data,$id) 
    {
        $user = new User;

        // updating updated data
        $update = User::where('id', $id)
                ->update(['first'      =>  $data['first'],
                         'last'        =>  $data['last'],
                         'middle'      =>  $data['middle'],
                         'suffix'      =>  $data['suffix'],   
                         'employement' =>  $data['employement'],
                         'employer'    =>  $data['employer'],
                         'dob'         =>  $data['dob'],
                         'gender'      =>  $data['gender'],
                         'status'      =>  $data['status'],
                         'rstreet'     =>  $data['rstreet'],
                         'rcity'       =>  $data['rcity'],
                         'rstate'      =>  $data['rstate'],
                         'rphone'      =>  $data['rphone'],
                         'ostreet'     =>  $data['ostreet'],
                         'ocity'       =>  $data['ocity'],
                         'ostate'      =>  $data['ostate'],
                         'ophone'      =>  $data['ophone'],
                         'photo'       =>  $data['photo'],
                         'username'    =>  $data['username'],
                         'tweet'       =>  $data['tweet'],
                         'extra'       =>  $data['extra']
                        ]);
    }
    /**
    * Create a method to fetch addresses of users
    *
    * @param id
    * @return address
    */
    public function getAllAddress($id)
    {   
        //to fetch addresses
        $address = DB::table('users')
                        ->where('id',$id)
                        ->get();

        return $address;
    }
}
