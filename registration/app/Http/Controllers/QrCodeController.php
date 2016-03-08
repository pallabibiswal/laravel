<?php

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
		if (Auth::check()) {
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
		\Session::flash('status', 'Please login!');
        return redirect('login');
	}
}
