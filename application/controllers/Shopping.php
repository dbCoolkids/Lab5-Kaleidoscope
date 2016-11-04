<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping extends Application {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $stuff = file_get_contents('../data/receipt.md');
    	$this->data['receipt'] = $this->parsedown->parse($stuff);
    	$this->data['content'] = '';

    	$count = 1;
    	foreach ($this->Categories->all() as $category) {
    		$chunk = 'category' . $count; 
    		$this->data[$chunk] = $this->parser->parse('category-shop',$category,true);
    		foreach($this->Menu->all() as $menuitem) {
    			if($menuitem->category != $category->id)
    				continue;
    			$this->data[$chunk] .= $this->parser->parse('menuitem-shop', $menuitem,true);
    		}
    		$count++;
		}
            // get the user role
    $this->data['userrole'] = $this->session->userdata('userrole');
    if ($this->data['userrole'] == NULL) $this->data['userrole'] = '?';
    
    	$this->render('template_shopping'); 
    }

}