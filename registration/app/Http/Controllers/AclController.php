<?php

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
     */
    public function postRole(Request $request)
    {
        
      if(Auth::check()) {
      	$role = new Role;
       	$role->role = $request->input('role');
        $this->validate($request, [
         'role'   => 'bail|required|max:30|min:3|alpha',
        ]);
        $role->save();
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
     */
    public function postResource(Request $request)
    {
        
      if(Auth::check()) {
      	$resource = new Resource;
       	$resource->resource = $request->input('resource');
        $this->validate($request, [
         'resource'   => 'bail|required|max:30|min:3|alpha',
        ]);
        $resource->save();
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
     */
    public function postOperation(Request $request)
    {
        
      if(Auth::check()) {
      	$operation = new Operation;
       	$operation->operation = $request->input('operation');
        $this->validate($request, [
         'operation'   => 'bail|required|max:30|min:3|alpha',
        ]);
        $operation->save();
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
     */
    public function postAssignRole(Request $request)
    {
        
      if(Auth::check()) {
      		$users = User::find($request->input('username'));
      		$users->role_id = $request->input('username');
      		$users->save();
      		$assign = new Assignrole;
      		$assign->user_id = $request->input('username');
      		$assign->role_id = $request->input('role');
      		$assign->save();
      		\Session::flash('status', 'Successfully assign a role to user!');
        	return redirect('assign');
     	} else {
        \Session::flash('status', 'Please login!');
        return redirect('login');
     	}   
    }
     /**
     * Create a method to assign resources to role
     *
     * @param  object $request
     */
    public function postAssignResource(Request $request)
    {
        
      if(Auth::check()) {
      		$assign = new Assignresource;
      		$assign->role_id = $request->input('role');
      		$assign->resource_id = $request->input('resource');
      		$assign->save();
      		\Session::flash('status', 'Successfully assign resources to a role!');
        	return redirect('assign');
     	} else {
        \Session::flash('status', 'Please login!');
        return redirect('login');
     	}   
    }
    /**
     * Create a method to assign operations to role
     *
     * @param  object $request
     */
    public function postAssignOperation(Request $request)
    {
        
      if(Auth::check()) {
      		$assign = new Assignoperation;
      		$assign->role_id = $request->input('role');
      		$assign->operation_id = $request->input('operation');
      		$assign->save();
      		\Session::flash('status', 'Successfully assign operations to a role!');
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
     */
    public function editPrivilege(Request $request)
    {
        
      if(Auth::check()) {
      		$result = $request->input('result');
      		if ($result === 'true') {
      			$privilege = new Privilege;
      			$privilege->role_id = $request->input('role_id');
      			$privilege->resource_id = $request->input('resource_id');
      			$privilege->operation_id = $request->input('operation_id');
				$privilege->save();
      		} else {
      			$privilege = Privilege::where(
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
     */
    public function viewGrid()
    {  
       if(Auth::check()) {
          
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
     */
    public function updateGrid(Request $request)
    {  
       if (Auth::check()) {
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
     */
    public function getTweet(Request $request)
    {
        
      if(Auth::check()) {
            $user   = $request->input('user');
            echo $user;
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
     */
    public function getAssignment()
    {
        
      if(Auth::check()) {
            $role = Auth::user()->role_id;

            $resource = DB::table('resources')
                    ->where('resource', 'assignment')
                    ->value('resource_id');

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
