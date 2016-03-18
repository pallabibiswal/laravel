<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;

class SearchController extends Controller
{

    /**
     * Create a method to get hotel details
     *
     * @param object $request
     * @return view search,array $data,$total,$detail
     */
    public function hotelDetail(Request $request) 
    {
        
        //validating user request
         $this->validate($request, [
            'search'   => 'required',
            'checkin'  => 'required',
            'checkout' => 'required', 
        ]);

        //call helper method to get latitude and longitude of the location
        $lanlog = get_latlng($request->input('search'));
        
        //store search location
        $detail['city']      = $request->input('search');
        $detail['checkin']  = date("Y-m-d", strtotime($request->input('checkin')));
        $detail['checkout'] = date("Y-m-d", strtotime($request->input('checkout')));

        $today = date("Y/m/d");

        //validating with current dates
        if (strtotime($detail['checkin'])<strtotime($today)
            || strtotime($detail['checkout'])<=strtotime($today)) {
            \Session::flash('status','Please provide correct Date.');
            return redirect('/');
        }

        //get hotel details from expedia API
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://terminal2.expedia.com/x/hotels?location='
            .$lanlog['lat'].','.$lanlog['lng'].'&checkInDate='.$detail['checkin'].
            '&checkOutDate='.$detail['checkout'].
            '&radius=5km&apikey=6z3rxiRROPeMug17Ll2eVLX2m6DGtlkc');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        //decode the json data
        $jsonData = json_decode(curl_exec($curlSession),true);
        
        //store total no. of hotels
        $total['count'] = $jsonData['HotelCount'];

        //store required details into an array
        for ($i=0; $i < $total['count']; $i++ ) {
        
            if (isset($jsonData['HotelInfoList']['HotelInfo'][$i]['ThumbnailUrl'])) {
            $data[$i]['photo'] = $jsonData['HotelInfoList']['HotelInfo'][$i]['ThumbnailUrl'];
            }   
            $data[$i]['name']     = $jsonData['HotelInfoList']['HotelInfo'][$i]['Name'];
            $data[$i]['address']  = $jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['StreetAddress'];
            $data[$i]['address'] .= ','.$jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['City'];
            $data[$i]['address'] .= ','.$jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['Province'];
            if (isset($jsonData['HotelInfoList']['HotelInfo'][$i]['StarRating'])){
            $data[$i]['ratings']  = $jsonData['HotelInfoList']['HotelInfo'][$i]['StarRating'];
            }
            if (isset($jsonData['HotelInfoList']['HotelInfo'][$i]['Price']['TotalRate']['Value'])){
            $data[$i]['price']  = $jsonData['HotelInfoList']['HotelInfo'][$i]['Price']['TotalRate']['Value'];
            }
        
        }
        
        curl_close($curlSession);

        //return array to search view to display data
        return view('search',compact('data','total','detail'));
    }

    /**
     * Create a method to get hotel details by sorting
     *
     * @param object $request
     * @return view search,array $data,$total,$detail
     */
    public function sortedHotelDetail(Request $request)
    {
       //call helper method to get latitude and longitude of the location
        $lanlog = get_latlng($request->input('city'));
       
        //store search location
        $detail['city']      = $request->input('city');
        $detail['checkin']   = date("Y-m-d", strtotime($request->input('checkin')));
        $detail['checkout']  = date("Y-m-d", strtotime($request->input('checkout')));
        $detail['sort']      = $request->input('sort');
        
        //get hotel details from expedia API
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://terminal2.expedia.com/x/hotels?location='
            .$lanlog['lat'].','.$lanlog['lng'].'&checkInDate='.$detail['checkin'].
            '&checkOutDate='.$detail['checkout'].
            '&radius=5km&sort='.$detail['sort'].'&apikey=6z3rxiRROPeMug17Ll2eVLX2m6DGtlkc');
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

        //decode the json data
        $jsonData = json_decode(curl_exec($curlSession),true);

        //store total no. of hotels
        $total['count'] = $jsonData['HotelCount'];

        //store required details into an array
        for ($i=0; $i < $total['count']; $i++ ) {
            if (isset($jsonData['HotelInfoList']['HotelInfo'][$i]['ThumbnailUrl'])) {
            $dat[$i]['photo'] = $jsonData['HotelInfoList']['HotelInfo'][$i]['ThumbnailUrl'];
            }   
            $dat[$i]['name']     = $jsonData['HotelInfoList']['HotelInfo'][$i]['Name'];
            $dat[$i]['address']  = $jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['StreetAddress'];
            $dat[$i]['address'] .= ','.$jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['City'];
            $dat[$i]['address'] .= ','.$jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['Province'];
            if (isset($jsonData['HotelInfoList']['HotelInfo'][$i]['StarRating'])){
            $dat[$i]['ratings']  = $jsonData['HotelInfoList']['HotelInfo'][$i]['StarRating'];
            }
            if (isset($jsonData['HotelInfoList']['HotelInfo'][$i]['Price']['TotalRate']['Value'])){
            $dat[$i]['price']  = $jsonData['HotelInfoList']['HotelInfo'][$i]['Price']['TotalRate']['Value'];
            }
        }        
        curl_close($curlSession);  
        $data = json_encode($dat);
        echo $data;
     
    }
}

