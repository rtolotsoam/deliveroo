<?php


class Accueil extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();
        $this->load->library('Datatables');
    }

    

    public function index()
    {

        $this->datatable();

    }

    public function datatable()
    {

        $level = $this->session->userdata('level');

        if($this->session->userdata('loggin') && $level == "admin"){

          $results = $this->datatables->select('matricule,libelle_categorie,campagne_id,etapes,sortie,debut_date,debut_heure,fin_date,fin_heure')
          //->unset_column('campagne_id')
          ->from('vw_historique2');

          echo $this->datatables->generate();

        }else{

          redirect('login');

        } 
    }

    public function datatable_filtre()
    {


        $level = $this->session->userdata('level');

        if($this->session->userdata('loggin') && $level == "admin"){
            


            $results = $this->datatables->select('matricule,libelle_categorie,campagne_id,etapes,sortie,debut_date,debut_heure,fin_date,fin_heure');


            if($this->input->post('matricule') && $this->input->post('matricule') != ""){

                $matr = $this->input->post('matricule');

                $count = count($matr);

                if($count == 1){
                  if($matr[0] != ""){
                    $this->datatables->where('matricule ='.(int) $matr[0], null, false);
                  }
                }else if($count == 2){
                  
                  $this->datatables->where('matricule IN ('.(int) $matr[0].','.(int) $matr[1].')', null, false);
                }else{

                  $requete = "matricule IN (".(int) $matr[0].",";

                  $n = $count -1;

                  for($i = 1; $i < $n; $i++ ){
                    
                      $requete .= (int) $matr[$i].",";

                  }

                  
                  $requete .= (int) $matr[$n].")";  
                  
                  $this->datatables->where($requete, null, false);
                  
                }
            }
            if(($this->input->post('dateD') && $this->input->post('dateF')) && ($this->input->post('dateD') != '' && $this->input->post('dateF') != '') ){
                
                $this->datatables->where('debut_date_1 BETWEEN \''.$this->input->post('dateD').'\' AND \''.$this->input->post('dateF').'\'', null, false);
                //$this->datatables->where('debut_date_1 <= ', $this->input->post('dateF'));

            }
            if(($this->input->post('heureD') && $this->input->post('heureF')) && ($this->input->post('heureD') != '' && $this->input->post('heureF') != '') ){

                $this->datatables->where('debut_heure_1 BETWEEN \''.$this->input->post('heureD').'\' AND \''.$this->input->post('heureF').'\'', null, false);
                //$this->datatables->where('debut_heure_1 <= ', $this->input->post('heureF'));

            }
             
            $this->datatables->from('vw_historique2');

            echo $this->datatables->generate();

        }else{

          redirect('login');

        } 
    }

    public function datatableUser()
    {
        $level = $this->session->userdata('level');

        // var_dump($level);

        if($this->session->userdata('loggin') && $level == "user"){

          $mle = (int) $this->session->userdata('mle');

          $results = $this->datatables->select('libelle_categorie,campagne_id,etapes,sortie,debut_date,debut_heure,fin_date,fin_heure')
                      ->where('matricule', $mle)
          //->unset_column('campagne_id')
          ->from('vw_historique2');

          echo $this->datatables->generate();

        }else{

          redirect('login');

        } 
    }


    public function datatableAdmin()
    {
        $level = $this->session->userdata('level');

        // var_dump($level);

        if($this->session->userdata('loggin') && $level == "admin"){

          $mle = (int) $this->session->userdata('mle');

          $results = $this->datatables->select("
              matricule,
              level,
              prenom,
              mail,
              (CASE 
                  WHEN  statut = 1 THEN '<span class=\"label label-success\"> ACTIVER </span>'
                    ELSE '<span class=\"label label-danger\"> DESACTIVER </span>'
                  END) AS statut
              ,
              (CASE 
                  WHEN  access_1 = 1 THEN '<span class=\"label label-success\" data-toggle=\"tooltip\" data-original-title=\"DELIVERY SUPPORT\" data-placement=\"left\"> OUI </span> '
                    ELSE '<span class=\"label label-danger\" data-toggle=\"tooltip\" data-original-title=\"DELIVERY SUPPORT\" data-placement=\"left\"> NON </span>'
                  END) AS access_1,
              (CASE 
                  WHEN  access_2 = 1 THEN '<span class=\"label label-success\" data-toggle=\"tooltip\" data-original-title=\"RESTAURANT SUPPORT\" data-placement=\"left\"> OUI </span> '
                    ELSE '<span class=\"label label-danger\" data-toggle=\"tooltip\" data-original-title=\"RESTAURANT SUPPORT\" data-placement=\"left\"> NON </span>'
                  END) AS access_2,
              (CASE 
                  WHEN  access_3 = 1 THEN '<span class=\"label label-success\" data-toggle=\"tooltip\" data-original-title=\"CUSTOMER SUPPORT\" data-placement=\"left\"> OUI </span> '
                    ELSE '<span class=\"label label-danger\" data-toggle=\"tooltip\" data-original-title=\"CUSTOMER SUPPORT\" data-placement=\"left\"> NON </span>'
                  END) AS access_3,
              (CASE 
                  WHEN  access_4 = 1 THEN '<span class=\"label label-success\" data-toggle=\"tooltip\" data-original-title=\"ORDER MONITORING\" data-placement=\"left\"> OUI </span> '
                    ELSE '<span class=\"label label-danger\" data-toggle=\"tooltip\" data-original-title=\"ORDER MONITORING\" data-placement=\"left\"> NON </span>'
                  END) AS access_4,
              (CASE 
                  WHEN  gestion_user = 1 THEN '<span class=\"label label-success\" data-toggle=\"tooltip\" data-original-title=\"GESTION DES UTILISATEUR\" data-placement=\"right\"> OUI </span> '
                    ELSE '<span class=\"label label-danger\" data-toggle=\"tooltip\" data-original-title=\"GESTION DES UTILISATEUR\" data-placement=\"right\"> NON </span>'
                  END) AS gestion_user,
              (CASE 
                  WHEN  gestion_process = 1 THEN '<span class=\"label label-success\" data-toggle=\"tooltip\" data-original-title=\"GESTION DES PROCESSUS\" data-placement=\"right\"> OUI </span> '
                    ELSE '<span class=\"label label-danger\" data-toggle=\"tooltip\" data-original-title=\"GESTION DES PROCESSUS\" data-placement=\"right\"> NON </span>'
                  END) AS gestion_process,
              ('<div class=\"btn-group btn-group-sm\"><a href=\"#modifier-user-'  || fte_user_id || '\" data-toggle=\"modal\" class=\"btn btn-inverse\"><i class=\"fa fa-pencil\"></i></a></div>') as fte_user_id,
              ('<div class=\"btn-group btn-group-sm\"><a href=\"#supprimer-user-' || fte_user_id || '\" data-toggle=\"modal\" class=\"btn btn-danger\"><i class=\"fa fa-times\"></i></a></div>') as fte_user_id2
              ")
			->where('flag', 1)
          ->from('fte_user');


          // $this->datatables->add_column('modifier', '
          //           <div class="btn-group btn-group-sm">
          //             <a href="#modifier-user-" data-toggle="modal" class="btn btn-inverse"><i class="fa fa-pencil"></i></a>
          //           </div>');
          // $this->datatables->add_column('supprimer', '
          //           <div class="btn-group btn-group-sm">
          //             <a href="#supprimer-user-" data-toggle="modal" class="btn btn-danger"><i class="fa fa-times"></i></a>
          //           </div>');

          echo $this->datatables->generate();

        }else{

          redirect('login');

        } 
    }

}