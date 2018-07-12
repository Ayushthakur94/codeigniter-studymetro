<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Trainer extends CI_Controller {

	public function __construct() {
        parent::__construct();
        checkUserSession(array('4'));
        $this->uid = $this->session->userdata("user_id");
        $this->first_name = $this->session->userdata("first_name");
        $this->last_name = $this->session->userdata("last_name");
        $this->user_name = $this->first_name." ".$this->last_name;
        $this->module = $this->router->fetch_module();
        $this->class = $this->router->fetch_class();
        $this->url = $this->module.'/'.$this->class;
    }

}

?>