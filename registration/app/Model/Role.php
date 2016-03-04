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

class Role extends Model
{
 
 /**
 * Create a method to add new role
 *
 * @param  array $data
 */
    public function addRole($data)
    {
	 	$role = new Role;
	 	$role->role = $data['role'];
	 	$role->save();
    }	   

}
