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

class Assignrole extends Model
{
    
     /**
     * Create a method to assign role to user
     *
     * @param  array $data
     */
    public function assignRoleToUser($data)
    {
        $assign = new Assignrole;
        $assign->user_id = $data['userid'];
        $assign->role_id = $data['roleid'];
        $assign->save();
    }
}
