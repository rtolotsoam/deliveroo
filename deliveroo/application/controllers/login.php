<?php

class Login extends CI_Controller {

	public function __construct()
    {
        //  Obligatoire
        parent::__construct();
        $this->load->library('form_validation');
    }

	public function index()
	{
		$this->login();
	}

	public function login()
	{
		// CODE
		foreach (array_keys($this->session->userdata) as $key) {
			$this->session->unset_userdata($key);
		}
		// END CODE

		//** PARAMETRE VUE **
		$data['titre'] = 'CONNEXION';
		$data['css'] = array('admin/module.admin.page.login.min','admin/module.global');
		//** END PARAMETRE VUE **

		//** APPEL VUE **
        $this->load->view('includes/header_login.php', $data);
        $this->load->view('includes/script_login.php');
        $this->load->view('login.php', $data);
        $this->load->view('includes/js.php');
		//** END APPEL VUE **
	}
}

