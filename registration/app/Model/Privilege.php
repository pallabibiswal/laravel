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

class Privilege extends Model
{
    /**
     * Create a method to add privilege
     *
     * @param  array $data
     */
    public function addPrivilege($data)
    {
        $privilege = new Privilege;

        $privilege->role_id = $data['roleid'];
		$privilege->resource_id = $data['resourceid'];
		$privilege->operation_id = $data['operationid'];

		$privilege->save();
    }
}
