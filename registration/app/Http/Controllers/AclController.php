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
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Session;
use App\User;
use App\Model\Role;
use App\Model\Resource;
use App\Model\Operation;
use App\Model\Assignrole;
use App\Model\Assignresource;
use App\Model\Assignoperation;
use App\Model\Privilege;
use Validator;
use Twitter;

class AclController extends Controller
{
	
    /**
     * Create a method get role view 
     *
     *@return view add/login
     */
    public function getAdd()
    {
        
        if(Auth::check()) {
      	    return view('add');
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
        }   
    }
    
     /**
     * Create a method to add new role
     *
     * @param  object $request
     * @return view add/login
     */
    public function postRole(Request $request)
    {
        
        if(Auth::check()) {
          	$role = new Role;

            //validating role field
            $this->validate($request, [
             'role'   => 'bail|required|max:30|min:3|alpha',
            ]);

            //calling a method to save new role
           	$data['role'] = $request->input('role');
            $role->addRole($data);
           
            \Session::flash('status', 'Successfully added a role!');
            return redirect('add');
     	
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
    
     /**
     * Create a method to add new resource
     *
     * @param  object $request
     * @return view add/login
     */
    public function postResource(Request $request)
    {
        
        if(Auth::check()) {
          	$resource = new Resource;
            
            //validating resource field
            $this->validate($request, [
             'resource'   => 'bail|required|max:30|min:3|alpha',
            ]);
           	
            //calling a method to save resource
            $data['resource'] = $request->input('resource');
            $resource->addResource($data);
            
            \Session::flash('status', 'Successfully added a resource!');
            return redirect('add');
     	
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
    
     /**
     * Create a method to add new operation
     *
     * @param  object $request
     * @return view add/login
     */
    public function postOperation(Request $request)
    {
        
        if(Auth::check()) {
          	$operation = new Operation;

            //validating operation field
            $this->validate($request, [
             'operation'   => 'bail|required|max:30|min:3|alpha',
            ]);
           	
            //calling a method to save operation
            $data['operation'] = $request->input('operation');
            $operation->addOperation($data);
        
            \Session::flash('status', 'Successfully added a operation!');
            return redirect('add');
     	} else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
    
    /**
     * Create a method to view assign page
     *
     * @param  object $request
     * @return view assign/login
     */
    public function getAssign()
    {
        
        if(Auth::check()) {
          	
            $role = Role::all();
          	$user = User::all();
          	$resource = Resource::all();
          	$operation= Operation::all();
          	return view('assign',compact('role','user','resource','operation'));
        
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
        }   
    }
    /**
     * Create a method to assign arole to user
     *
     * @param  object $request
     * @return view assign/login
     */
    public function postAssignRole(Request $request)
    {
        
      if(Auth::check()) {

            //assigning a user to a role
      		$users = User::find($request->input('username'));
      		$users->role_id = $request->input('role');
      		$users->save();
      		
            $assign = new Assignrole;
            
            //calling method to assign a role to user
            $data['userid'] = $request->input('username');
            $data['roleid'] = $request->input('role');
            $assign->assignRoleToUser($data);
      		
            \Session::flash('status', 'Successfully assign a role to user!');
        	return redirect('assign');
     	} else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
    
     /**
     * Create a method to view privileges
     *
     * @param  object $request
     * @return view privilege/login
     */
    public function getPrivilege(Request $request)
    {
        
        if(Auth::check()) {
      		$role = Role::all();
      		return view('privilege',compact('role'));
     	} else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
    
     /**
     * Create a method to get privilege table
     *
     * @param  object $request
     * @return view login/string $outputTable
     */
    public function postPrivilege(Request $request)
    {
        
        if(Auth::check()) {
          	$resource = Resource::all();
          	$operation= Operation::all();
      		$privilege = Privilege::where('role_id',$request->input('role'))->get();
      		foreach ($privilege as $row) {
    			$privilegedata[
    			$row->role_id.'-'.$row->resource_id.'-'.$row->operation_id] = true;
    		}
    		$roleid = $request->input('role');
    	    
            //creating table string using fetched data 
            $outputTable = '<table class="table"><tr><td>Resources</td>
    	    				<td>Privileges</td></tr>';
    	    foreach ( $resource as $resourcedata ) {
    		    $outputTable .= '<tr class="info"><td>
    		    '.ucfirst($resourcedata->resource).'</td><td>';
    			foreach($operation as $operationdata) {
    		    	$check = $roleid.'-'.$resourcedata->resource_id.'-'
    		    	.$operationdata->operation_id;
    		        $outputTable .='<input type="checkbox"'.
    	        	'onchange="editPrivilege(this.checked, ' . $roleid .
    	        	','. $resourcedata->resource_id .
    	        	', '.$operationdata->operation_id .')" '.
    	         	(isset($privilegedata[$check]) ? ' 
    	         	checked="checked" ' : '') .
    	         	'/> '.$operationdata['operation'] .
    	            '&nbsp;&nbsp;&nbsp;';
    		    }
	        $outputTable .= '</td></tr>';
	        }
	        $outputTable .= '</table>';
		    echo $outputTable;
     	
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
    
    /**
     * Create a method to edit privileges
     *
     * @param  object $request
     * @return view login
     */
    public function editPrivilege(Request $request)
    {
        
        if(Auth::check()) {
      		$result = $request->input('result');
      		
            //if result true then add privilege
            if ($result === 'true') {
      			$privilege = new Privilege;
      			$data['roleid'] = $request->input('role_id');
      			$data['resourceid'] = $request->input('resource_id');
      			$data['operationid'] = $request->input('operation_id');
				$privilege->addPrivilege($data);
      		
            //if result is false then delete a privilege
            } else {
                $data = Privilege::where(
      			'role_id', $request->input('role_id') )
				->where('resource_id', $request->input('resource_id'))
				->where('operation_id', $request->input('operation_id'))
				->delete();
      		}
     	} else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
     	}   
    }
     /**
     * Create a method to get jqgrid view.
     *
     * @return view grid/login
     */
     public function grid()
    {
        if(Auth::check()) {
            return view('grid');
        }  else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
        }  

    }

     /**
     * Create a method to post data in jqgrid.
     *
     * @return view login/responce json data
     */
    public function viewGrid()
    {  
        if(Auth::check()) {
            
            //fetchi all data and displaying in grid
            $user = new User;
            $data = user::all();
            return response()->json($data);

        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
        }  
    }
     
     /**
     * Create a method to update jqgrid data.
     *
     * @param  object $request
     * @return view login
     */
    public function updateGrid(Request $request)
    {  
       if (Auth::check()) {

        //if the request is for edit
        if ($request->input('oper') === 'edit') {
            $data = DB::table('users')
                   ->where('id',$request->input('id'))
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
                             'username'    => $request->input('username'),         
                             'tweet'       => $request->input('tweet'),
                             'extra'       => $request->input('extra')
                    ]);
        }

        //if the request is for deletion
        if ($request->input('oper') === 'del') {
            $user = new User;
            $user = User::find($request->input('id'));
            $user->delete();
        }

        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
         }  
    }
    
    /**
     * Create a method to get tweet data
     *
     * @param  object $request
     * @return view login/html data
     */
    public function getTweet(Request $request)
    {
        
        if(Auth::check()) {
            $user   = $request->input('user');

            //get tweets 
            $tweets = Twitter::getUserTimeline([
                'screen_name' => $user, 
                'count' => 5, 
                'format' => 'json'
            ]);
            echo $tweets;
        
        } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
        }   
    }
    
     /**
     * Create a method to get assignment view
     *
     * @return view welcome/login/assignment
     */
    public function getAssignment()
    {
        
        if(Auth::check()) {

            //fetching role id
            $role = Auth::user()->role_id;

            //fetching resource id
            $resource = DB::table('resources')
                    ->where('resource', 'assignment')
                    ->value('resource_id');

            //fetching permissions
            $permission = Privilege::where('role_id',$role)
                        ->where('resource_id',$resource)
                        ->get();
            
            foreach( $permission as $key) {
                $name[] = DB::table('operations')
                        ->where('operation_id',$key->operation_id)
                        ->value('operation');
            }
            if (isset($name)) {
                return view('assignment',compact('name'));
            } 
            
            \Session::flash('status', 'You Do Not Have Any Permissions');
            return redirect('/');

         } else {
            \Session::flash('status', 'Please login!');
            return redirect('login');
         }   
    }
}
