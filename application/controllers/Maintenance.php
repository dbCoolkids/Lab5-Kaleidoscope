<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends Application
{

	function __construct() {
        parent::__construct();
}


public function index() {
    $role = $this->session->userdata('userrole');
    if ($role == 'admin') 
    	$stuff = "Welcome admin! :D";
    else 
    	$stuff = "You are not authorized to access this page. Go away";
    $this->data['content'] = $this->parsedown->parse($stuff);

        // get the user role
	$this->data['userrole'] = $this->session->userdata('userrole');
	if ($this->data['userrole'] == NULL) $this->data['userrole'] = '?';

    $this->render('template.php'); 
}

}