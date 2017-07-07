<?php


class Fte_insert_msg extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('fte_msg_insert','insert_msg');
        $this->load->model('fte_categories','cats');
        $this->load->model('fte_user','user');

    }
    public function insert()
    {
            $matricule = $this->input->get_post('matricule');
            $datedeb   = $this->input->get_post('datedeb');
            $datefin   = $this->input->get_post('datefin');
            $msg       = $this->input->get_post('msg');
            $cat       = $this->input->get_post('categ');
            $mat_modif = $this->session->userdata('mle');
            $objet      = $this->input->get_post('objet');
            $now       = date("Y-m-d H:i:s");
                
            $data      =  array(
                            'matricule'     => $matricule,
                           'datedeb_msg'    => $datedeb,
                           'datefin_msg'    => $datefin,
                           'description'    => $msg,
                           'datetime_modif' => $now,
                           'objet'          => $objet,
                           'id_categorie'   => $cat,
                           'matricule_modif'=> $mat_modif
                          );
            
           
             $insert    = $this->insert_msg->insert($data);

            echo $insert;
    }
    public function all_msg()
    {
        
        $data['categories'] = $this->cats->liste_categories_by_niveau(1);
        $users              = $this->user->liste_utilisateur();
        
        $list_msg           = $this->insert_msg->all_msg();
        $data['list_msg']   = $list_msg;
        $data['users_modal'] = $users;
        
        $js_ck = "/assets/components/modules/admin/forms/editors/ckeditor"; 

        $array_mdg_id = array();
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
        }
        

        $this->load->view('back/liste_table_msg_view.php', $data);
        $this->load->view('back/modal_edit_msg_view.php', $data_ck);
    }

    public function update()
    {
            $matricule = $this->input->get_post('matricule');
            $datedeb   = $this->input->get_post('datedeb');
            $datefin   = $this->input->get_post('datefin');
            $msg       = $this->input->get_post('msg');
            $cat       = $this->input->get_post('categ');
            $mat_modif = $this->session->userdata('mle');
            $objet     = $this->input->get_post('objet');
            $id        = $this->input->get_post('id_msg');
            $etat      = $this->input->get_post('etat'); 
            $now       = date("Y-m-d H:i:s");
            $data_array      =  array(
                            'matricule'     => $matricule,
                           'datedeb_msg'    => $datedeb,
                           'datefin_msg'    => $datefin,
                           'description'    => $msg,
                           'datetime_modif' => $now,
                           'objet'          => $objet,
                           'id_categorie'   => $cat,
                           'matricule_modif'=> $mat_modif,
                           'flag'           => $etat
                          );
            $this->insert_msg->update(array('id_alerte'=>$this->input->get_post('id_msg')),$data_array);
    }
}
   