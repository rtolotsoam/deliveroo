<?php 
	class Alert extends CI_Controller
	{
		
		public function __construct()
    	{
        //  Obligatoire
        	parent::__construct();
        	$this->load->model('fte_front_alert','front_alert');
		}

		public function front_all_categorie()
		{
			
			$all_categorie = $this->front_alert->all_categorie($this->session->userdata('mle'));
			// var_dump($all_categorie);
			$this->affiche_front($all_categorie);
		}
		
		public function fron_by_cat_n_matricule(){
			$all_cate = $this->front_alert->alert_by_matr_n_cat($this->session->userdata('mle'),$this->session->userdata('cat_alert'));
			$this->affiche_front($all_cate);
			
			
		}
		public function affiche_front($objet){
			$i = 0 ;
			$alert_info ="";
			$value_all = "";
            //var_dump($objet);
			foreach ($objet as $value_all) {
				 $type_alerte = $value_all['type_alerte'];
				 $type = $value_all['type'];
				 $zone = $value_all['zone'];
				 $oobjet = $value_all['objet'];
				 $montant = $value_all['montant'];
				 
				 if($montant =='') $montant = 0;
				 $description = $value_all['description'];
				 $description = explode('<p>', $description);
				 $description = explode('</p>',$description[1]);
				 $description = $description[0];
				 $matricule   = $value_all['matricule'];
				 $hr = '';
				 if($i >=0)
				 {
				 	$hr = '<hr/>';
				 }
				 $alert_info .=$hr;				
				 $alert_info .="
			          <p style='color: black !important;'>
						<span class='label label-success' style='text-align:left;'>Objet : </span>&nbsp;&nbsp;".$oobjet." 
					  </p>
				      <p style='color: black !important;'>
						<span class='label label-success' style='text-align:left;'>Description</span> :&nbsp;&nbsp;".$description." 
						
				      </p>
					 
			           ";
			     $i++;
			}
			echo $alert_info.'|sep|'.$i;
		}
	}

?>