<?php


class Fte_insert_alert extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fte_alerte_insert','alert');
        $this->load->model('fte_alerte_type_alert','type');
        $this->load->model('fte_categories','cats');
        $this->load->model('fte_alerte_zone','zone');
        $this->load->model('fte_user','user');
    }

    public function index()
    {
        $now         = date("Y-m-d H:i:s");
        $matricule   = $this->input->get_post('matricule');
        $datedeb     = $this->input->get_post('datedeb');
        $datefin     = $this->input->get_post('datefin');
        $description = $this->input->get_post('msg');
        $cat         = $this->input->get_post('categ');
        $zone        = $this->input->get_post('zone');
        $montant     = $this->input->get_post('montant');
        $type        = $this->input->get_post('type');   
        $type_alert  = $this->input->get_post('type_alert');   

        $mat_modif   = $this->session->userdata('mle');
        
        $now         = date("Y-m-d H:i:s");
        
        if($montant =='')    $montant = 0;
        $data        =  array(
                        'matricule'       => $matricule,
                        'datedeb'         => $datedeb,
                        'datefin'         => $datefin,
                        'categorie'       => $cat,
                        'type_alerte'     => $type_alert,
                        'type'     		  => $type,
                        'zone'     		  => $zone,
                        'montant'     	  => $montant,
                        'description'     => $description,
                        'date_modif' 	  => $now,
                        'matricule_modif' => $mat_modif
                    );
        
        
         $insert    = $this->alert->insert($data);
        
        echo $insert;
    }

     public function all_alert()
    {
        
       
        
        $js_ck    = "/assets/components/modules/admin/forms/editors/ckeditor"; 

        $all_alert = $this->alert->all_alert();
        $all_zone  = $this->zone->liste_zone();
        $data['categories'] = $this->cats->liste_categories_by_niveau(1); 
        $data['type'] = $this->type->all_type(); 

        $data['all_alert'] = $all_alert;
        $data['all_zone'] = $all_zone;

        //var_dump($all_alert);
        /*$array_mdg_id = array();
         foreach ($list_msg as $key) {
            $data_ck['msg_'.$key->msg_id] = array(
                'id'    =>  'msg_'.$key->msg_id,
                'path'  =>  $js_ck,
                'config' => array(
                    'toolbar'   =>  "Basic",     //Using the Full toolbar
                    'width'     =>  "100%",    //Setting a custom width
                    'height'    =>  "100%",    //Setting a custom height
                    'filebrowserBrowseUrl' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/ckfinder/ckfinder.html",
                    'customConfig' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/config_msg_alert.js"
                    )
                );
        }*/
        

        $this->load->view('back/liste_table_alert_view.php', $data);
        
    }
    
}