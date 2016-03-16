<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SearchController extends Controller
{

    /**
     * Create a method to get hotel details
     *
     * @param object $request
     * @return  
     */
    public function hotelDetail(Request $request) 
    {
        //call helper method to get latitude and longitude of the location
        $data = get_latlng($request->input('search'));

        //store search location
        $jsonData['city'] = $request->input('search');

        //get hotel details from expedia API
        $curlSession = curl_init();
        curl_setopt($curlSession, CURLOPT_URL, 'http://terminal2.expedia.com/x/hotels?location='
            .$data['lat'].','.$data['lng']
            .'&radius=5km&apikey=6z3rxiRROPeMug17Ll2eVLX2m6DGtlkc');
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
        $data[$i]['name'] = $jsonData['HotelInfoList']['HotelInfo'][$i]['Name'];
        $data[$i]['address'] = $jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['StreetAddress'];
        $data[$i]['address'] .= $jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['City'];
        $data[$i]['address'] .= $jsonData['HotelInfoList']['HotelInfo'][$i]['Location']['Province'];
        $data[$i]['description'] = $jsonData['HotelInfoList']['HotelInfo'][$i]['Description'];
        }

        curl_close($curlSession);

        //return array to search view to display data
        return view('search',compact('data','total'));
    }
}
