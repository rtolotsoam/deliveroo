<?php

class Deconnexion extends CI_Controller {

	public function __construct()
    {
        //  Obligatoire
        parent::__construct();
    }

	public function index()
	{
		$this->deconnexion();
	}

	public function deconnexion()
	{
		if($this->session->userdata('loggin')){
			foreach (array_keys($this->session->userdata) as $key) {
				$this->session->unset_userdata($key);
			}
			redirect('login');
	    }else{
	    	redirect('login');
	    }
	}
}

