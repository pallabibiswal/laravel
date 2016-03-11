<?php
/**
 * Create a method to display information in update page.
 *
 *@param new,old
 *@return new/old
 */
function displayValue($new,$old)
{
    if (!empty($new) || $new === '') {
        return $new;
    } else {
        return $old;
    }
}

/**
 * Create a method to make css and js versioning
 *
 *@param $path,$secure
 *@return path/exception
 */
function asset_timed($path, $secure = null){
    $file = public_path($path);
    if(file_exists($file)){
        return asset($path, $secure) . '?' . filemtime($file);
    }else{
        throw new \Exception('The file "'.$path.'" cannot be found in the public folder');
    }
}

?>