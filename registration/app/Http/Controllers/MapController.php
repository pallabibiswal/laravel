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
use Auth;

class MapController extends Controller
{

    /**
	* Create a method to get view to search a location
	*
	*@return view searched
	*/
	public function getMapSearch()
	{	
		$id = Auth::user()->id;
		$user = new User;

		//to fetch user address
		$data = $user->getAllAddress($id);
		return view('mapsearch', compact('data'));  	       	
	}	   
	 
	/**
	* Create a method to get the map
	*
	*@param object request
	*@return view searched
	*/
	public function postSearch(Request $request)
	{	
		//fetch requested address
		$address['location'] = $request->input('address');
		return view('searched',compact('address'));	    
	}	     
}
