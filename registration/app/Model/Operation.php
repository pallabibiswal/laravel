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

class Operation extends Model
{
 
/**
 * Create a method to add new operation
 *
 * @param  array $data
 */
    public function addOperation($data)
    {
	 	$operation = new Operation;
	 	$operation->operation = $data['operation'];
	 	$operation->save();
    }	
}
