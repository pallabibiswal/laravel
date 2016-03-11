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
use Auth;

class QrCodeController extends Controller
{
 
 /**
 * Create a method to generate QR code
 *
 * @param object request
 * @return view print
 */
	public function makeQrCode(Request $request)
	{

		//validating user request
		 $this->validate($request, [
	        'product'     => 'required',
	        'description' => 'required',
	        'sku'         => 'required',
	        'price'       => 'bail|required|numeric', 
	        ]);
		
		//storing in an array
		$data['product']     = $request->input('product');	
		$data['description'] = $request->input('description');	
		$data['sku']         = $request->input('sku');	
		$data['price']       = $request->input('price');

		return view('print',compact('data'));
	}
}
