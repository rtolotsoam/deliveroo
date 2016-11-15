<?php


class Erreur extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

    }

    

    public function index()
    {

        $this->erreur();

    }


    public function erreur()
    {
        if($this->session->userdata('loggin')){

            //** CODE **        
            //** END CODE **
			
            //** PARAMETRE VUE **
			$data['titre'] = 'ERREUR';
            $data['css'] = array('admin/module.admin.page.error.min');
            //** END PARAMETRE VUE **
		
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('erreur_view.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }

}