<?php if(!defined('BASEPATH')) exit('No direct script access allowed');


/**
 * This function is used to print the content of any data
 */
function pre($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}


if(!function_exists('get_instance'))
{
    function get_instance()
    {
        $CI = &get_instance();
    }
}



?>