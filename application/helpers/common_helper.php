<?php


/** function that prints array passed in a readable format
 * 
 * @param array $array
 */
function debug_array($array)
{
    echo "<pre>";
    print_r($array);
    echo "</pre>";
}

/** function that verifies whether the user has permissions to edit or update records 
 * of the given school
 * 
 * @param type $user_id
 */
function is_authorized_user($user_id)
{
    
}

