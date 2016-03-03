<?php
/**
 * Create a method to display information in update page.
 *
 *@param new,old
 *@return void
 */
function displayValue($new,$old)
{
	if (!empty($new) || $new === '') {
		return $new;
	} else {
		return $old;
	}
}
?>