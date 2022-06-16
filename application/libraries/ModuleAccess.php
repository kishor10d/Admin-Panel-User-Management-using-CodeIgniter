<?php defined('BASEPATH') OR exit('No direct script access allowed');

class ModuleAccess {

	private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    	$this->CI->config->item('moduleList');
    }
}