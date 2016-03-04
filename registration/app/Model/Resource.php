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
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    
 /**
 * Create a method to add new resource
 *
 * @param  array $data
 */
    public function addResource($data)
    {
	 	$resource = new Resource;
	 	$resource->resource = $data['resource'];
	 	$resource->save();
    }	
}
