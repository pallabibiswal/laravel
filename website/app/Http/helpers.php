<?php

/**
 * Create a method to make css and js versioning
 *
 *@param $path,$secure
 *@return path/exception
 */
function asset_timed($path, $secure = null)
{
    
    $file = public_path($path);

    //checks if file exist or not
    if(file_exists($file)){
        return asset($path, $secure) . '?' . filemtime($file);
    }else{
        throw new \Exception('The file "'.$path.'" cannot be found in the public folder');
    }
}

/**
 * Create a method to get latitude and longitude
 *
 *@param $address
 *@return array $latLng
 */
function get_latlng($address) 
{
    //store address
    $address = urlencode(trim($address));

    //url to get latitude and longitude of the address
    $details_url = "http://maps.googleapis.com/maps/api/geocode/json?address=" . $address . "&sensor=false";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $details_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = json_decode(curl_exec($ch), true);
    if ($response['status'] != 'OK') {
        return null;
    }
    $latLng = $response['results'][0]['geometry']['location'];
    return $latLng;
}

?>