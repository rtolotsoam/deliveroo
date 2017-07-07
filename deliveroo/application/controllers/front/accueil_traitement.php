<?php


class Accueil_traitement extends CI_Controller
{


    
    public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_categories','cats');
        $this->load->model('fte_traitement','traits');
        $this->load->model('fte_user','usr');
        $this->load->model('fte_notification','not');

    }

    

    public function index($id)
    {
        if($id == "1"){

            $this->timeline_ds($id);

        }else{
            $this->accueil_traitement($id);
        }

    }

    public function accueil_traitement($id)
    {
        if($this->session->userdata('loggin')){

            //** CODE **
            $notifications = $this->get_notification();

            $id_traits = (int) $id;
            
            if($id_traits){
                $this->session->set_userdata('process_redirect', $id_traits);
                $categories = $this->cats->liste_categories_by_parent($id_traits);

                $donnes_menu = $this->cats->liste_categories_by_id($id_traits);

                foreach ($donnes_menu as $val_menu) {
                    $menu = $val_menu->libelle_categories;
                }

            }else{
                $process_redirect = $this->session->userdata('process_redirect');                
                $categories = $this->cats->liste_categories_by_parent($process_redirect);
            }


            // var_dump($this->session->userdata('user'));

            if($this->session->userdata('user')){

                $user = $this->session->userdata('user');


                if(!empty($user)){

                    foreach ($user as $val_user) {
                        $id_user = $val_user->fte_user_id;
                        $data_user['id_user'] = $id_user;

                        $this->session->set_userdata('id_user', $id_user);

                        $data_user['matricule'] = $val_user->matricule;
                        $data_user['prenom'] = $val_user->prenom;
                        $data_user['pass'] = $val_user->pass;
                        $data_user['mail'] = $val_user->mail; 
                    }

                    $this->session->unset_userdata('user');
                }
            }else{

                $user = $this->usr->liste_utilisateur_ById((int) $this->session->userdata('id_user'));

                if(!empty($user)){

                    foreach ($user as $val_user) {
                        $id_user = $val_user->fte_user_id;
                        $data_user['id_user'] = $id_user;

                        $data_user['matricule'] = $val_user->matricule;
                        $data_user['prenom'] = $val_user->prenom;
                        $data_user['pass'] = $val_user->pass;
                        $data_user['mail'] = $val_user->mail; 
                    }

                }
            }


            

            $var_url_modif_user_profil = "var url_modif_user_profil = "."\"".site_url("back/utilisateur/modifier_profil")."\";";
            $var_url_accueil = "var url_accueil = "."\"".site_url("front/accueil_traitement/normal")."\";";
            $var_url_search = "var url_js_search = "."\"".site_url("front/accueil_processus/search_normal")."\";";
            $var_acc_search = "var url_acc_search = "."\"".site_url("front/accueil_processus/normal")."\";";
            $var_acc_notification = "var url_acc_notification = "."\"".site_url("front/accueil_traitement/affiche_notification")."\";";
            $level = $this->session->userdata('level');
            //** END CODE **
            
            //** PARAMETRE VUE **
            $data['titre'] = 'ACCUEIL TRAITEMENTS';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min','admin/module.admin.page.notifications.min');
            $data['categories'] = $categories;

            if(!empty($menu)){
                $data['menu'] = $menu;
            }

            if($id_traits){
                $data['traitement'] = $id_traits;
            }else{
                $data['traitement'] = $process_redirect;
            }

            $data['prenom'] = $this->session->userdata('prenom');
            $data['level'] = $level;
            $data['js'] = array('js/back.js','js/users.js','js/search.js','js/notification.js');
            $data['js_info'] = array($var_url_modif_user_profil, $var_url_accueil, $var_url_search, $var_acc_search, $var_acc_notification);
            $data['notifications'] = $notifications;
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            $this->load->view('front/accueil_traitement_view.php', $data);
            $this->load->view('front/user_profil_view.php', $data_user);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }


    public function normal()
    {
        if($this->session->userdata('loggin')){

            //** CODE **

            $notifications = $this->get_notification();

            $process_redirect = $this->session->userdata('process_redirect');                

            if($process_redirect == "1"){

                redirect('front/accueil_traitement/timeline_ds_normal');

            }else{

                    $categories = $this->cats->liste_categories_by_parent($process_redirect);
                    $donnes_menu = $this->cats->liste_categories_by_id($process_redirect);

                    foreach ($donnes_menu as $val_menu) {
                        $menu = $val_menu->libelle_categories;
                    }

                    if($this->session->userdata('user')){

                    $user = $this->session->userdata('user');


                if(!empty($user)){

                        foreach ($user as $val_user) {
                            $id_user = $val_user->fte_user_id;
                            $data_user['id_user'] = $id_user;

                            $this->session->set_userdata('id_user', $id_user);

                            $data_user['matricule'] = $val_user->matricule;
                            $data_user['prenom'] = $val_user->prenom;
                            $data_user['pass'] = $val_user->pass;
                            $data_user['mail'] = $val_user->mail; 
                        }

                        $this->session->unset_userdata('user');
                    }
                }else{

                    $user = $this->usr->liste_utilisateur_ById((int) $this->session->userdata('id_user'));

                    if(!empty($user)){

                        foreach ($user as $val_user) {
                            $id_user = $val_user->fte_user_id;
                            $data_user['id_user'] = $id_user;

                            $data_user['matricule'] = $val_user->matricule;
                            $data_user['prenom'] = $val_user->prenom;
                            $data_user['pass'] = $val_user->pass;
                            $data_user['mail'] = $val_user->mail; 
                        }

                    }
                }


                $var_url_modif_user_profil = "var url_modif_user_profil = "."\"".site_url("back/utilisateur/modifier_profil")."\";";
                $var_url_accueil = "var url_accueil = "."\"".site_url("front/accueil_traitement/normal")."\";";
                $var_url_search = "var url_js_search = "."\"".site_url("front/accueil_processus/search_normal")."\";";
                $var_acc_search = "var url_acc_search = "."\"".site_url("front/accueil_processus/normal")."\";";
                $var_acc_notification = "var url_acc_notification = "."\"".site_url("front/accueil_traitement/affiche_notification")."\";";
                $level = $this->session->userdata('level');
                //** END CODE **
                
                //** PARAMETRE VUE **
                $data['titre'] = 'ACCUEIL TRAITEMENTS';
                $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min','admin/module.admin.page.notifications.min');
                $data['categories'] = $categories;
                $data['level'] = $level;

                if(!empty($menu)){
                    $data['menu'] = $menu;
                }

                if($process_redirect){
                    $data['traitement'] = $process_redirect;
                }

                $data['prenom'] = $this->session->userdata('prenom');
                $data['js'] = array('js/back.js','js/users.js','js/search.js','js/notification.js');
                $data['js_info'] = array($var_url_modif_user_profil, $var_url_accueil, $var_url_search, $var_acc_search, $var_acc_notification);
                $data['notifications'] = $notifications;
                //** END PARAMETRE VUE **
            
                //** APPEL VUE **
                $this->load->view('includes/header.php', $data);
                $this->load->view('includes/menu_vertical.php', $data);
                //$this->load->view('includes/menu_horizental.php');
                $this->load->view('front/accueil_traitement_view.php', $data);
                $this->load->view('front/user_profil_view.php', $data_user);
                $this->load->view('includes/footer.php');
                $this->load->view('includes/js.php');
                //** END APPEL VUE **

        }

            
        }else{
            redirect('login');
        }

    }

    public function timeline_ds($id){

        if($this->session->userdata('loggin')){

            //** CODE **

            $notifications = $this->get_notification();

            $id_traits = (int) $id;
            
            if($id_traits){
                $this->session->set_userdata('process_redirect', $id_traits);
                $categories = $this->cats->liste_categories_by_parent($id_traits);

                $donnes_menu = $this->cats->liste_categories_by_id($id_traits);

                foreach ($donnes_menu as $val_menu) {
                    $menu = $val_menu->libelle_categories;
                }

            }else{
                $process_redirect = $this->session->userdata('process_redirect');                
                $categories = $this->cats->liste_categories_by_parent($process_redirect);
            }


            // var_dump($this->session->userdata('user'));

            if($this->session->userdata('user')){

                $user = $this->session->userdata('user');


                if(!empty($user)){

                    foreach ($user as $val_user) {
                        $id_user = $val_user->fte_user_id;
                        $data_user['id_user'] = $id_user;

                        $this->session->set_userdata('id_user', $id_user);

                        $data_user['matricule'] = $val_user->matricule;
                        $data_user['prenom'] = $val_user->prenom;
                        $data_user['pass'] = $val_user->pass;
                        $data_user['mail'] = $val_user->mail; 
                    }

                    $this->session->unset_userdata('user');
                }
            }else{

                $user = $this->usr->liste_utilisateur_ById((int) $this->session->userdata('id_user'));

                if(!empty($user)){

                    foreach ($user as $val_user) {
                        $id_user = $val_user->fte_user_id;
                        $data_user['id_user'] = $id_user;

                        $data_user['matricule'] = $val_user->matricule;
                        $data_user['prenom'] = $val_user->prenom;
                        $data_user['pass'] = $val_user->pass;
                        $data_user['mail'] = $val_user->mail; 
                    }

                }
            }


            

            $var_url_modif_user_profil = "var url_modif_user_profil = "."\"".site_url("back/utilisateur/modifier_profil")."\";";
            $var_url_accueil = "var url_accueil = "."\"".site_url("front/accueil_traitement/normal")."\";";
            $var_url_search = "var url_js_search = "."\"".site_url("front/accueil_processus/search_normal")."\";";
            $var_acc_search = "var url_acc_search = "."\"".site_url("front/accueil_processus/normal")."\";";
            $var_acc_notification = "var url_acc_notification = "."\"".site_url("front/accueil_traitement/affiche_notification")."\";";
            $level = $this->session->userdata('level');
            //** END CODE **
            
            //** PARAMETRE VUE **
            $data['titre'] = 'ACCUEIL TRAITEMENTS';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min','admin/module.admin.page.notifications.min');
            $data['categories'] = $categories;

            if(!empty($menu)){
                $data['menu'] = $menu;
            }

            if($id_traits){
                $data['traitement'] = $id_traits;
            }else{
                $data['traitement'] = $process_redirect;
            }

            $data['prenom'] = $this->session->userdata('prenom');
            $data['level'] = $level;
            $data['js'] = array('js/back.js','js/users.js','js/search.js','js/notification.js');
            $data['js_info'] = array($var_url_modif_user_profil, $var_url_accueil, $var_url_search, $var_acc_search, $var_acc_notification);

            $data['notifications'] = $notifications;
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            //$this->load->view('front/accueil_traitement_view.php', $data);
            $this->load->view('front/timeline_view.php', $data);
            $this->load->view('front/user_profil_view.php', $data_user);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }

    }

    public function timeline_ds_normal(){

        if($this->session->userdata('loggin')){

            //** CODE **
            $notifications = $this->get_notification();

            $process_redirect = $this->session->userdata('process_redirect');                

            $categories = $this->cats->liste_categories_by_parent($process_redirect);
            $donnes_menu = $this->cats->liste_categories_by_id($process_redirect);

                foreach ($donnes_menu as $val_menu) {
                    $menu = $val_menu->libelle_categories;
                }

                if($this->session->userdata('user')){

                $user = $this->session->userdata('user');


            if(!empty($user)){

                    foreach ($user as $val_user) {
                        $id_user = $val_user->fte_user_id;
                        $data_user['id_user'] = $id_user;

                        $this->session->set_userdata('id_user', $id_user);

                        $data_user['matricule'] = $val_user->matricule;
                        $data_user['prenom'] = $val_user->prenom;
                        $data_user['pass'] = $val_user->pass;
                        $data_user['mail'] = $val_user->mail; 
                    }

                    $this->session->unset_userdata('user');
                }
            }else{

                $user = $this->usr->liste_utilisateur_ById((int) $this->session->userdata('id_user'));

                if(!empty($user)){

                    foreach ($user as $val_user) {
                        $id_user = $val_user->fte_user_id;
                        $data_user['id_user'] = $id_user;

                        $data_user['matricule'] = $val_user->matricule;
                        $data_user['prenom'] = $val_user->prenom;
                        $data_user['pass'] = $val_user->pass;
                        $data_user['mail'] = $val_user->mail; 
                    }

                }
            }


            $var_url_modif_user_profil = "var url_modif_user_profil = "."\"".site_url("back/utilisateur/modifier_profil")."\";";
            $var_url_accueil = "var url_accueil = "."\"".site_url("front/accueil_traitement/normal")."\";";
            $var_url_search = "var url_js_search = "."\"".site_url("front/accueil_processus/search_normal")."\";";
            $var_acc_search = "var url_acc_search = "."\"".site_url("front/accueil_processus/normal")."\";";
            $var_acc_notification = "var url_acc_notification = "."\"".site_url("front/accueil_traitement/affiche_notification")."\";";
            $level = $this->session->userdata('level');
            //** END CODE **
            
            //** PARAMETRE VUE **
            $data['titre'] = 'ACCUEIL TRAITEMENTS';
            $data['css'] = array('admin/module.admin.page.form_wizards.min','admin/module.admin.page.modals.min','admin/module.global','admin/module.admin.page.pricing_tables.min','admin/module.admin.page.notifications.min');
            $data['categories'] = $categories;
            $data['level'] = $level;

            if(!empty($menu)){
                $data['menu'] = $menu;
            }

            if($process_redirect){
                $data['traitement'] = $process_redirect;
            }

            $data['prenom'] = $this->session->userdata('prenom');
            $data['js'] = array('js/back.js','js/users.js','js/search.js','js/notification.js');
            $data['js_info'] = array($var_url_modif_user_profil, $var_url_accueil, $var_url_search, $var_acc_search, $var_acc_notification);
            $data['notifications'] = $notifications;
            //** END PARAMETRE VUE **
        
            //** APPEL VUE **
            $this->load->view('includes/header.php', $data);
            $this->load->view('includes/menu_vertical.php', $data);
            //$this->load->view('includes/menu_horizental.php');
            //$this->load->view('front/accueil_traitement_view.php', $data);
            $this->load->view('front/timeline_view.php', $data);
            $this->load->view('front/user_profil_view.php', $data_user);
            $this->load->view('includes/footer.php');
            $this->load->view('includes/js.php');
            //** END APPEL VUE **

            
        }else{
            redirect('login');
        }
    }


    public function get_notification(){


        if($this->input->post('ajax') == "notifications"){

            $results_notifcation = $this->not->liste_notification_by_matricule($this->session->userdata('mle'));

            if(!empty($results_notifcation)){

                $i=0;
                $menu = "";
                foreach ($results_notifcation as $notification) {
                    $i++;
                    if($i == 3){
                        break;
                    }
                    $main_menu = '
                        <li>
                                        <div class="media">
                                            <div class="media-body">
                                                <a href="" onclick="notification('.$notification->id_notification.'); return false;" class="strong"> <i class="fa fa-circle"></i> '.ascii_to_entities(substr($notification->objet, 0, 25)).'... </a><span class="pull-right time-email">'.$notification->matricule_modif.'</span>
                                                <div class="clearfix"></div>
                                                '.ascii_to_entities(str_replace("§§§"," <i class='fa fa-hand-o-right'></i> ",substr($notification->description,0,60))).'...
                                            </div>
                                        </div>    
                                    </li>


                    ';

                    $menu = $menu."".$main_menu;
                }

                echo $menu."||".count($results_notifcation);
            }else{
                echo "vide";
            }

        }else{

            $results_notifcation = $this->not->liste_notification_by_matricule($this->session->userdata('mle'));
            return $results_notifcation;
        }
    }


    public function affiche_notification(){
        
        if($this->session->userdata('loggin') && $this->input->post('ajax') == "1"){
            
            $id_not = $this->input->post('id_not');

            /*************** insertion état *************************/

            $data_etat = array(
                    'id_notification' => $id_not,
                    'matricule' => (int) $this->session->userdata('mle')
                );

            $this->not->ajouter_etat($data_etat);

            /***************** END (insertion état) ***********************/

            /*********** pour affichage Notification ***************/
            $data['id_not'] = $id_not;

            $notifications = $this->not->liste_notification_by_id($id_not);

            $data['notifications'] = $notifications;

            $poppup = $this->load->view('front/poppup_notification_view.php', $data, true);

            echo $poppup;
            /************ END (pour affichage Notification) **************/

        }else{
            redirect('login');
        }
    }



}