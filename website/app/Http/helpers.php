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
/**
 * Create a method to get url contents
 *
 *@param $url
 *@return array $jsonData
 */
function getUrlContent($url)
{
    //get hotel details from expedia API
    $curlSession = curl_init();
    curl_setopt($curlSession, CURLOPT_URL, $url);
    curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
    curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);

    //decode the json data
    $jsonData = json_decode(curl_exec($curlSession),true);

    return $jsonData;
}

?>