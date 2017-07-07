<?php

class Msg_notification extends CI_Controller
{

    public function __construct()
    {
        //  Obligatoire
        parent::__construct();
        $this->load->library('Datatables');
        $this->load->model('fte_notification', 'notification');

    }

    public function index()
    {
        $this->admin_msg_alert();
    }

    public function admin_msg_alert()
    {
        $data['titre']  = 'NOTIFICATION';
        $data['level']  = $this->session->userdata('level');
        $data['gest_g'] = $this->session->userdata('ges_g');
        $data['gest_u'] = $this->session->userdata('ges_u');

        $data['css'] = array('admin/module.admin.page.form_wizards.min',
            'admin/module.global',
            'admin/module.admin.page.tabs.min',
            'admin/module.admin.page.modals.min',
            'admin/module.admin.page.form_elements.min',
            'admin/custom_datepicker',
        );

        $js_ck = "/assets/components/modules/admin/forms/editors/ckeditor";

        $data['noti_10'] = array(
            'id'     => 'description_not',
            'path'   => $js_ck,
            'config' => array(
                'toolbar'              => "Basic", //Using the Full toolbar
                'width'                => "100%", //Setting a custom width
                'height'               => "100%", //Setting a custom height
                'filebrowserBrowseUrl' => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/ckfinder/ckfinder.html",
                'customConfig'         => "/deliveroo/assets/components/modules/admin/forms/editors/ckeditor/config_msg_alert.js",
            ),
        );
        $this->load->view('includes/header.php', $data);
        $this->load->view('includes/menu_vertical.php', $data);
        $this->load->view('back/msg_notification_view.php', $data);
        $this->load->view('includes/footer.php');
        $this->load->view('includes/js.php');

    }

    public function ajax_add()
    {

        $mat_modif = $this->session->userdata('mle');
        $objet     = $this->input->get_post('objet');
        $now       = date("Y-m-d H:i:s");
        $objet     = utf8_decode($this->input->post('objet'));
        $data      = array(
            'datedeb'         => $this->input->post('datedeb'),
            'datefin'         => $this->input->post('datefin'),
            'description'     => $this->input->post('description'),
            'objet'           => $objet,
            'flag'            => $this->input->post('flag'),
            'datetime_modif'  => $now,
            'matricule_modif' => $mat_modif,
        );

        $res = $this->notification->insert($data);
        if ($res > 0) {
            echo json_encode(array("status" => true));
        }

    }

    public function ajax_list()
    {
        $results = $this->datatables->select('datedeb,datefin,description,objet,flag,id_notification')
            ->from('vw_all_notification');
        echo $this->datatables->generate();
    }

    public function ajax_edit($id)
    {
        $data = $this->notification->get_by_id($id);

        echo json_encode($data);
    }
    public function ajax_update()
    {

        $mat_modif = $this->session->userdata('mle');
        $objet     = $this->input->get_post('objet');
        $now       = date("Y-m-d H:i:s");
        $objet     = utf8_decode($this->input->post('objet'));
        $data      = array(
            'datedeb'         => $this->input->post('datedeb'),
            'datefin'         => $this->input->post('datefin'),
            'description'     => $this->input->post('description'),
            'objet'           => $objet,
            'flag'            => $this->input->post('flag'),
            'datetime_modif'  => $now,
            'matricule_modif' => $mat_modif,
        );

        $this->notification->update(array('id_notification' => $this->input->post('id_notification')), $data);
        echo json_encode(array("status" => true));
    }
}
