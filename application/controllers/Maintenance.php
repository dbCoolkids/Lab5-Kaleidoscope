<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends Application
{

    function __construct() {
        parent::__construct();
        $this->load->helper('formfields');
    }


    public function index() {

        $role = $this->session->userdata('userrole');
        if ($role == 'admin') {
            $this->data['pagebody'] ='mtce';
            $this->data['items'] = $this->Menu->all();
        }
        else {
            $stuff = "You are not authorized to access this page. Go away";
            $this->data['content'] = $this->parsedown->parse($stuff);

        }

        // get the user role
        $this->data['userrole'] = $this->session->userdata('userrole');
        if ($this->data['userrole'] == NULL) $this->data['userrole'] = '?';

        $this->render(); 

    }

    public function edit($id=null) {
        // try the session first
        $key = $this->session->userdata('key');
        $record = $this->session->userdata('record');
        // if not there, get them from the database
        if (empty($key)) {
            $record = $this->menu->get($id);
            $key = $id;
            $this->session->set_userdata('key',$id);
            $this->session->set_userdata('record',$record);
        }

        // build the form fields
        $this->data['fid'] = makeTextField('Menu code', 'id', $record->id);
        $this->data['fname'] = makeTextField('Item name', 'name', $record->name);
        $this->data['fdescription'] = makeTextField('Description', 'description', $record->description);
        $this->data['fprice'] = makeTextField('Price, each', 'price', $record->price);
        $this->data['fpicture'] = makeTextField('Item image', 'picture', $record->picture);
        $this->data['fcategory'] = makeTextField('Category', 'category', $record->category);
        // show the editing form
        $this->data['pagebody'] = "mtce-edit";
        $this->render();

    }

}


/*
*/


/*

public function index() {
    $userrole = $this->session->userdata('userrole');
    if($userrole != 'admin'){
        $message = 'You are not authorized to access page, go away';
        $this->data['content'] = $message;
    }

        // get the user role
    $this->data['userrole'] = $this->session->userdata('userrole');
    if ($this->data['userrole'] == NULL) $this->data['userrole'] = '?';


    $message = 'Get ready to fix stuff admin :D';
    $this->data['content'] = $message;
    $this->render('template.php');

}

*/