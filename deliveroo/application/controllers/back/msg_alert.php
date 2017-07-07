<?php


class Msg_alert extends CI_Controller
{
    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

         $this->load->library('Datatables');

        $this->load->model('fte_user','user');
        $this->load->model('fte_categories','cats');
        // $this->load->model('fte_msg_insert','insert_msg');
        $this->load->model('fte_alerte_zone','zone');
        $this->load->model('fte_alerte_insert','alert');
        $this->load->model('fte_alerte_type_alert','type');
	}

    

    public function index()
    {
        $this->admin_msg_alert(); 
    }

    public function categories_by_id($id)
    {
        $list_cat = $this->cats->liste_categories_by_niveau(1);
        foreach ($list_cat as $value_cat) {
            $data_cat[$value_cat->fte_categories_id] = $value_cat->libelle_categories;
        }
        return $data_cat[$id];

    }
    public function admin_msg_alert()
    {
        
        $data['titre'] = 'ALERTES';

        $data['level'] = $this->session->userdata('level');
        $data['gest_g'] = $this->session->userdata('ges_g');
        $data['gest_u'] = $this->session->userdata('ges_u');

       /* $all_zone = $this->all_zone();
        $all_type =$this->zone->liste_type();

        $data['all_zone'] = $all_zone;*/
        $users = $this->user->liste_utilisateur();
        $categories = $this->cats->liste_categories_by_niveau(1);
       // $list_msg = $this->insert_msg->all_msg();
       // $data['list_msg'] = $list_msg;
        $data['users_modal'] = $users;
        $data['categories'] = $categories;
        
       /* $array_mdg_id = array();
        foreach ($list_msg as $key) {
            $array_mdg_id[] = $key->id_msg;
        }
        $data['msg_id'] = $array_mdg_id;*/

        $data['css'] = array(
        				   	'admin/module.global',
        					'admin/module.admin.page.tables.min',
                            'admin/module.admin.page.modals.min',
                            'admin/module.admin.page.form_elements.min',
                            'admin/custom_datepicker'
        				);

        $js_ck = "/assets/components/modules/admin/forms/editors/ckeditor"; 
        $data['msg_10'] = array(
                'id'    =>  'msg_insert',
                'path'  =>  $js_ck,
                'config' => array(
                    'toolbar'   =>  "Basic",     //Using the Full toolbar
                    'width'     =>  "100%",    //Setting a custom width
                    'height'    =>  "100%",    //Setting a custom height
                    'filebrowserBrowseUrl' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/ckfinder/ckfinder.html",
                    'customConfig' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/config_msg_alert.js"
                    )
                );
        $data['alert_10'] = array(
                'id'    =>  'description',
                'path'  =>  $js_ck,
                'config' => array(
                    'toolbar'   =>  "Basic",     //Using the Full toolbar
                    'width'     =>  "100%",    //Setting a custom width
                    'height'    =>  "100%",    //Setting a custom height
                    'filebrowserBrowseUrl' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/ckfinder/ckfinder.html",
                    'customConfig' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/config_msg_alert.js"
                    )
                );
       /* $data['all_type'] = $all_type;*/
        
        $this->load->view('includes/header.php', $data);
        $this->load->view('includes/menu_vertical.php', $data);
        $this->load->view('back/msg_alert_view.php', $data);

        $this->load->view('includes/footer.php');
	    $this->load->view('includes/js.php');
            
	}
   /* public function all_zone()
    {
        // 
        $zone = $this->zone->liste_zone();
        $lis_id = array();
        $list_option = "<select class='form-control' name='zone'>";
        $list_option .= "<option value='0'>--Aucun--</option>";
        foreach ($zone as  $value_zone) {
            $id_zone = $value_zone->id_zone;
            $region = $value_zone->region;
            $enfant_zone = $this->zone->enfant_zone($id_zone);
            
            if(empty($enfant_zone) && ($value_zone->region_parent == 0) && (!in_array($id_zone,$lis_id)) )
            {
               $list_option .= "<option value='".$id_zone."'>".$region."</option>";
                array_push($lis_id,$id_zone);
            }
            else
            {
                $i = 0;
                foreach ($enfant_zone as $area_child ) 
                {
                        if(!in_array($area_child->id_zone,$lis_id))
                        {
                            if($i == 0)
                            {
                                   $list_option .= "<optgroup label='".$region."'>";
                            }
                            array_push($lis_id,$area_child->id_zone);
                            $list_option .=  "<option value='".$area_child->id_zone."'>".$area_child->region."</option>";
                            $i++;
                        }
                }
                $list_option .=  "</optgroup>";
            }
        }
       $list_option .= "</select >";
       return $list_option;
    }*/

    public function alert_type_by_id($id)
    {
        $data_alert_type = $this->type->all_type();
        foreach ($data_alert_type as $value_type) {
            $data_alerte[$value_type->id_type] = $value_type->type;
        }

        return $type_by_id =  $data_alerte[$id];
    }
    public function zone_by_id($id)
    {
        $all_zone = $this->zone->liste_zone();
        foreach ($all_zone as $value_zone) {
            $data_zone[$value_zone->id_zone] = $value_zone->region; 
        }
        
         return $datazone = $data_zone[$id];
    }
    public function ajax_list()
    {
        $results = $this->datatables->select('alerte,id_matricule,categorie,objet,description,datedeb,datefin,flag')->from('vw_all_alert');

        echo $this->datatables->generate();
    }

    public function ajax_edit($id)
    {
        $data = $this->alert->get_by_id($id);
       
        echo json_encode($data);
    }

    public function ajax_update()
    {
        
     // if($this->input->post('montant') == '') $montant = 0;
    /*$data = array(
                'matricule' => $this->input->post('matricule'),
                'datedeb' => $this->input->post('datedeb'),
                'categorie' => $this->input->post('categorie'),
                'datefin' => $this->input->post('datefin'),
                'type_alerte' => $this->input->post('type_alerte'),
                'type' => $this->input->post('type'),
                'zone' => $this->input->post('zone'),
                'montant' => $montant,
                'description' => $this->input->post('description'),
                'flag' => $this->input->post('flag'),
            );*/
        
        $mat_modif = $this->session->userdata('mle');
        $objet     = $this->input->get_post('objet');
        $now       = date("Y-m-d H:i:s");
        $objet = entities_to_ascii($this->input->post('objet'));

        $data = array(
                'matricule' => $this->input->post('matricule'),
                'datedeb' => $this->input->post('datedeb'),
                'datefin' => $this->input->post('datefin'),
                 'categorie' => $this->input->post('categorie'),
                'date_modif' => $now,
                'description' => $this->input->post('description'),
                'objet' => entities_to_ascii($objet),
                'matricule_modif' => $mat_modif,
                'flag' => $this->input->post('flag'),
            );

        $this->alert->update(array('id_alerte' => $this->input->post('id_alerte')), $data);
        echo json_encode(array("status" => TRUE));
    }
    public function ajax_add_msg()
    {
        
        $mat_modif = $this->session->userdata('mle');
        $objet     = $this->input->get_post('objet');
        $now       = date("Y-m-d H:i:s");
        $objet = entities_to_ascii($this->input->post('objet'));

    $data = array(
                'matricule' => $this->input->post('matricule'),
                'datedeb' => $this->input->post('datedeb'),
                'datefin' => $this->input->post('datefin'),
                 'categorie' => $this->input->post('categorie'),
                'date_modif' => $now,
                'description' => $this->input->post('description'),
                'objet' => entities_to_ascii($objet),
                'matricule_modif' => $mat_modif,
                'flag' => $this->input->post('flag'),
            );

        $res = $this->alert->insert($data);
        if( $res > 0)
            echo json_encode(array("status" => TRUE));
    }

}
