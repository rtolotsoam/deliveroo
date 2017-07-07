<?php

class Recap extends CI_Controller {

	public function __construct()
    {
        //  Obligatoire
        parent::__construct();

        $this->load->model('fte_categories','cats');
        $this->load->model('fte_historique_view','vwhist');


        $this->load->library('excel');
        $this->load->library('email');
        $this->load->library('style_export');
        
        
    }

	public function index()
	{
		$this->recap();
	}

	public function recap()
	{

		date_default_timezone_set('Africa/Nairobi');

		$base    = BASEPATH;
		
		$process = $this->cats->liste_categories_process();


		error_reporting(E_ALL);
        ini_set('display_errors', TRUE);
        ini_set('display_startup_errors', TRUE);

        define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

		
		$date_now_fr       = date('d-m-Y H:i:s');
		
		$date_now_fr1      = date('d-m-Y');
		
		$date_now_first    = '01-'.date('m-Y');
		
		$premier_lundi_now = date( "d-m-Y", strtotime($date_now_first." first Monday of 0 month" ));
		
		if($date_now_fr1 == $premier_lundi_now){

			$dateD     = date( "Y-m-d", strtotime($date_now_first." last month" ));
			$dateF     = date( "Y-m-d", strtotime($date_now_first." last day of last month" ));	
			
			
			$dateD_fr  = date( "d/m/Y", strtotime($date_now_first." last month" ));
			
			$dateF_fr  = date( "d/m/Y", strtotime($date_now_first." last day of last month" ));
			
			$dateD_fr1 = date( "d-m-Y", strtotime($date_now_first." last month" ));
			
			$dateF_fr1 = date( "d-m-Y", strtotime($date_now_first." last day of last month" ));

		}else{

			$dateD_fr  = date( "d/m/Y", strtotime("next Monday -1 week" ));
			$dateF_fr  = date( "d/m/Y", strtotime("next Sunday -1 week" ));
			
			
			$dateD_fr1 = date( "d-m-Y", strtotime("next Monday -1 week" ));
			$dateF_fr1 = date( "d-m-Y", strtotime("next Sunday -1 week" ));
			
			
			$dateD     = date( "Y-m-d", strtotime("next Monday -1 week" ));
			$dateF     = date( "Y-m-d", strtotime("next Sunday -1 week" ));
			

		}


		// total consultation
		$total_consult = $this->vwhist->total_nbr_consultation($dateD, $dateF);
		$total_consult = (int) $total_consult[0]->total_nbr;
		
		$filename      = 'recap_'.$dateD_fr1.'_au_'.$dateF_fr1.'.xls';
		$rep           = 'assets/files2/reporting/'.$filename;
		$directory     = str_replace("system/", $rep, $base);
		
		//$filename    = 'test_.xls';
		
		$titles        = array('DRIVER SUPPORT', 'RESTAURANT SUPPORT', 'CUSTOMER SUPPORT', 'ORDER MONITORING');
		$sheet         = 0;
		$ligne         = 1;

		foreach($titles as $value){
		    
		        $this->excel->createSheet();

		        // taille des cellules
		        $this->excel->setActiveSheetIndex($sheet)
		        ->getColumnDimension('A')->setWidth(30);
            	$this->excel->setActiveSheetIndex($sheet)
            	->getColumnDimension('B')->setWidth(40);
            	$this->excel->setActiveSheetIndex($sheet)
            	->getColumnDimension('C')->setWidth(100);
            	$this->excel->setActiveSheetIndex($sheet)
            	->getColumnDimension('D')->setWidth(30);
            	$this->excel->setActiveSheetIndex($sheet)
            	->getColumnDimension('E')->setWidth(30);

            	// bordures des cellules
            	$this->excel->setActiveSheetIndex($sheet)->getStyle('A'.$ligne)
            	->applyFromArray($this->style_export->border_style('000000'))
            	->applyFromArray($this->style_export->background('#466BAF'))
            	->applyFromArray($this->style_export->font_color('FFFFFF'));

            	$this->excel->setActiveSheetIndex($sheet)->getStyle('B'.$ligne)
            	->applyFromArray($this->style_export->border_style('000000'))
            	->applyFromArray($this->style_export->background('#7bb989'))
            	->applyFromArray($this->style_export->font_color('FFFFFF'));

            	
            	$this->excel->setActiveSheetIndex($sheet)->getStyle('C'.$ligne)
            	->applyFromArray($this->style_export->border_style('000000'))
            	->applyFromArray($this->style_export->background('#7bb989'))
            	->applyFromArray($this->style_export->font_color('FFFFFF'));

            	$this->excel->setActiveSheetIndex($sheet)->getStyle('D'.$ligne)
            	->applyFromArray($this->style_export->border_style('000000'))
            	->applyFromArray($this->style_export->background('#7bb989'))
            	->applyFromArray($this->style_export->font_color('FFFFFF'))
            	->applyFromArray($this->style_export->center());

            	$this->excel->setActiveSheetIndex($sheet)->getStyle('E'.$ligne)
            	->applyFromArray($this->style_export->border_style('000000'))
            	->applyFromArray($this->style_export->background('#7bb989'))
            	->applyFromArray($this->style_export->font_color('FFFFFF'))
            	->applyFromArray($this->style_export->center());

            	$this->excel->setActiveSheetIndex($sheet)->freezePane('B2');

				// titre de la table
		        $this->excel->setActiveSheetIndex($sheet)
		        ->setCellValue("A".$ligne, "$value");
		        $this->excel->setActiveSheetIndex($sheet)
		        ->setCellValue("B".$ligne, "Catégorie");
		        $this->excel->setActiveSheetIndex($sheet
		        	)->setCellValue("C".$ligne, "Traitement");
		        $this->excel->setActiveSheetIndex($sheet)
		        ->setCellValue("D".$ligne, "Nombre de consultation");
		        $this->excel->setActiveSheetIndex($sheet)
		        ->setCellValue("E".$ligne, "Nombre de consultation en %");


		        // titre des onglets
		        $this->excel->setActiveSheetIndex($sheet)->setTitle("$value");
		        
		    $sheet++;
		} 

		$ligne ++;
		
		// calcul total 

		$total_ds         = $total_rs = $total_cs = $total_om = 0;
		$total_nbr_ds     = $total_nbr_rs = $total_nbr_cs = $total_nbr_om = 0;
		$total_consult_ds = $total_consult_rs = $total_consult_cs = $total_consult_om = 0;

		foreach ($process as $val) {

			$traitement_id = $val->traitement_id;

			$libelle_activite = $this->cats->get_libelle_activite($traitement_id);


			
			if($libelle_activite[0]->libelle_activite == "DRIVER SUPPORT"){
				$total_ds ++;
			}
			if($libelle_activite[0]->libelle_activite == "RESTAURANT SUPPORT"){
				
				$total_rs ++;
			}
			if($libelle_activite[0]->libelle_activite == "CUSTOMER SUPPORT"){
				
				$total_cs ++;
			}
			if($libelle_activite[0]->libelle_activite == "ORDER MONITORING"){
				
				$total_om ++;
			}
		}

		$ds = $rs = $cs = $om = 2;

		foreach ($process as $val) {

			$traitement_id      = $val->traitement_id;
			$libelle_categories = $val->libelle_categories;
			$libelle_categories = ascii_to_entities($libelle_categories);
			$libelle_categories = html_entity_decode($libelle_categories , ENT_COMPAT, 'UTF-8');
			
			$libelle_activite   = $this->cats->get_libelle_activite($traitement_id);
			
			$libelle            = $val->parent_id;
			$libelle            = $this->cats->get_libelle_categories($traitement_id);
			$libelle            = ascii_to_entities($libelle[0]->libelle_categorie);
			$libelle            = html_entity_decode($libelle , ENT_COMPAT, 'UTF-8');
			
			$nbr                = $this->vwhist->nbr_consulation($traitement_id, $dateD, $dateF);


			
			if($libelle_activite[0]->libelle_activite == "DRIVER SUPPORT"){

				// nb consultation en %
				$nbr_consult_ds   = 0;
				$nbr_consult_ds   = ((int)$nbr[0]->nbr * 100 ) / (int) $total_consult;
				$nbr_consult_ds   = number_format((float)$nbr_consult_ds, 2, '.', '');
				
				// total nb consultation en %
				$total_consult_ds = $total_consult_ds + (float) $nbr_consult_ds;
				
				$this->excel->setActiveSheetIndex(0)
				->setCellValue("B".$ds, $libelle);
				$this->excel->setActiveSheetIndex(0)
				->setCellValue("C".$ds, $libelle_categories);
				$this->excel->setActiveSheetIndex(0)
				->setCellValue("D".$ds, $nbr[0]->nbr);
				$this->excel->setActiveSheetIndex(0)
				->setCellValue("E".$ds, $nbr_consult_ds);

				$total_nbr_ds = (int) $total_nbr_ds + (int) $nbr[0]->nbr;

				$this->excel->setActiveSheetIndex(0)->getStyle('B'.$ds)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(0)->getStyle('C'.$ds)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(0)->getStyle('D'.$ds)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());
				$this->excel->setActiveSheetIndex(0)->getStyle('E'.$ds)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());

				$ds ++;
			}
			if($libelle_activite[0]->libelle_activite == "RESTAURANT SUPPORT"){

				$nbr_consult_rs   = 0;
				$nbr_consult_rs   = ((int)$nbr[0]->nbr * 100 ) / (int) $total_consult;
				$nbr_consult_rs   = number_format((float)$nbr_consult_rs, 2, '.', '');
				
				// total nb consultation en %
				$total_consult_rs = $total_consult_rs + (float) $nbr_consult_rs;
				
				$this->excel->setActiveSheetIndex(1)
				->setCellValue("B".$rs, $libelle);
				$this->excel->setActiveSheetIndex(1)
				->setCellValue("C".$rs, $libelle_categories);
				$this->excel->setActiveSheetIndex(1)
				->setCellValue("D".$rs, $nbr[0]->nbr);
				$this->excel->setActiveSheetIndex(1)
				->setCellValue("E".$rs, $nbr_consult_rs);

				$total_nbr_rs = (int) $total_nbr_rs + (int) $nbr[0]->nbr;

				$this->excel->setActiveSheetIndex(1)->getStyle('B'.$rs)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(1)->getStyle('C'.$rs)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(1)->getStyle('D'.$rs)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());
				$this->excel->setActiveSheetIndex(1)->getStyle('E'.$rs)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());


				$rs ++;
			}
			if($libelle_activite[0]->libelle_activite == "CUSTOMER SUPPORT"){

				$nbr_consult_cs   = 0;
				$nbr_consult_cs   = ((int)$nbr[0]->nbr * 100 ) / (int) $total_consult;
				$nbr_consult_cs   = number_format((float)$nbr_consult_cs, 2, '.', '');
				
				// total nb consultation en %
				$total_consult_cs = $total_consult_cs + (float) $nbr_consult_cs;
				
				$this->excel->setActiveSheetIndex(2)
				->setCellValue("B".$cs, $libelle);
				$this->excel->setActiveSheetIndex(2)
				->setCellValue("C".$cs, $libelle_categories);
				$this->excel->setActiveSheetIndex(2)
				->setCellValue("D".$cs, $nbr[0]->nbr);
				$this->excel->setActiveSheetIndex(2)
				->setCellValue("E".$cs, $nbr_consult_cs);

				$total_nbr_cs = (int) $total_nbr_cs + (int) $nbr[0]->nbr;

				$this->excel->setActiveSheetIndex(2)->getStyle('B'.$cs)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(2)->getStyle('C'.$cs)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(2)->getStyle('D'.$cs)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());
				$this->excel->setActiveSheetIndex(2)->getStyle('E'.$cs)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());

				$cs ++;
			}
			if($libelle_activite[0]->libelle_activite == "ORDER MONITORING"){

				$nbr_consult_om = 0;
				$nbr_consult_om = ((int)$nbr[0]->nbr * 100 ) / (int) $total_consult;
				$nbr_consult_om = number_format((float)$nbr_consult_om, 2, '.', '');

				// total nb consultation en %
				$total_consult_om = $total_consult_om + (float) $nbr_consult_om;
				
				$this->excel->setActiveSheetIndex(3)
				->setCellValue("B".$om, $libelle);
				$this->excel->setActiveSheetIndex(3)
				->setCellValue("C".$om, $libelle_categories);
				$this->excel->setActiveSheetIndex(3)
				->setCellValue("D".$om, $nbr[0]->nbr);
				$this->excel->setActiveSheetIndex(3)
				->setCellValue("E".$om, $nbr_consult_om);

				$total_nbr_om = (int) $total_nbr_om + (int) $nbr[0]->nbr;

				$this->excel->setActiveSheetIndex(3)->getStyle('B'.$om)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(3)->getStyle('C'.$om)
				->applyFromArray($this->style_export->border_style('000000'));
				$this->excel->setActiveSheetIndex(3)->getStyle('D'.$om)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());
				$this->excel->setActiveSheetIndex(3)->getStyle('E'.$om)
				->applyFromArray($this->style_export->border_style('000000'))
				->applyFromArray($this->style_export->center());

				$om ++;
			}
		}

		$this->excel->setActiveSheetIndex(0)->getStyle('B'.$ds)
		->applyFromArray($this->style_export->border_style('000000'))
        ->applyFromArray($this->style_export->background('#466BAF'))
        ->applyFromArray($this->style_export->font_color('FFFFFF'));

        $this->excel->setActiveSheetIndex(0)->getStyle('C'.$ds)
		->applyFromArray($this->style_export->border_style('000000'));

		$this->excel->setActiveSheetIndex(0)->getStyle('D'.$ds)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());

		$this->excel->setActiveSheetIndex(0)->getStyle('E'.$ds)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());

		$this->excel->setActiveSheetIndex(0)
		->setCellValue("B".$ds, "TOTAL");
		$this->excel->setActiveSheetIndex(0)
		->setCellValue("C".$ds, $total_ds);
		$this->excel->setActiveSheetIndex(0)
		->setCellValue("D".$ds, $total_nbr_ds);
		$this->excel->setActiveSheetIndex(0)
		->setCellValue("E".$ds, $total_consult_ds);


		$this->excel->setActiveSheetIndex(1)->getStyle('B'.$rs)
		->applyFromArray($this->style_export->border_style('000000'))
        ->applyFromArray($this->style_export->background('#466BAF'))
        ->applyFromArray($this->style_export->font_color('FFFFFF'));

        $this->excel->setActiveSheetIndex(1)->getStyle('C'.$rs)
		->applyFromArray($this->style_export->border_style('000000'));

		$this->excel->setActiveSheetIndex(1)->getStyle('D'.$rs)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());
		$this->excel->setActiveSheetIndex(1)->getStyle('E'.$rs)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());

		$this->excel->setActiveSheetIndex(1)
		->setCellValue("B".$rs, "TOTAL");
		$this->excel->setActiveSheetIndex(1)
		->setCellValue("C".$rs, $total_rs);
		$this->excel->setActiveSheetIndex(1)
		->setCellValue("D".$rs, $total_nbr_rs);
		$this->excel->setActiveSheetIndex(1)
		->setCellValue("E".$rs, $total_consult_rs);

		$this->excel->setActiveSheetIndex(2)->getStyle('B'.$cs)
		->applyFromArray($this->style_export->border_style('000000'))
        ->applyFromArray($this->style_export->background('#466BAF'))
        ->applyFromArray($this->style_export->font_color('FFFFFF'));

        $this->excel->setActiveSheetIndex(2)->getStyle('C'.$cs)
		->applyFromArray($this->style_export->border_style('000000'));

		$this->excel->setActiveSheetIndex(2)->getStyle('D'.$cs)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());
		$this->excel->setActiveSheetIndex(2)->getStyle('E'.$cs)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());

		$this->excel->setActiveSheetIndex(2)
		->setCellValue("B".$cs, "TOTAL");
		$this->excel->setActiveSheetIndex(2)
		->setCellValue("C".$cs, $total_cs);
		$this->excel->setActiveSheetIndex(2)
		->setCellValue("D".$cs, $total_nbr_cs);
		$this->excel->setActiveSheetIndex(2)
		->setCellValue("E".$cs, $total_consult_cs);

		$this->excel->setActiveSheetIndex(3)->getStyle('B'.$om)
		->applyFromArray($this->style_export->border_style('000000'))
        ->applyFromArray($this->style_export->background('#466BAF'))
        ->applyFromArray($this->style_export->font_color('FFFFFF'));

        $this->excel->setActiveSheetIndex(3)->getStyle('C'.$om)
		->applyFromArray($this->style_export->border_style('000000'));

		$this->excel->setActiveSheetIndex(3)->getStyle('D'.$om)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());

		$this->excel->setActiveSheetIndex(3)->getStyle('E'.$om)
		->applyFromArray($this->style_export->border_style('000000'))
		->applyFromArray($this->style_export->center());

		$this->excel->setActiveSheetIndex(3)
		->setCellValue("B".$om, "TOTAL");
		$this->excel->setActiveSheetIndex(3)
		->setCellValue("C".$om, $total_om);
		$this->excel->setActiveSheetIndex(3)
		->setCellValue("D".$om, $total_nbr_om);
		$this->excel->setActiveSheetIndex(3)
		->setCellValue("E".$om, $total_consult_om);



		$objWriter      = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');

		/*header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
        header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0');
        header("Content-Transfer-Encoding: binary "); 
        
        $objWriter->save('php://output');*/

       $objWriter->save($directory);

        if(file_exists($directory)){

			$file_log         = "assets/files2/reporting/log_reporting.txt";
			$log              = str_replace("system/", $file_log, $base);
			
			$filename2        = 'logo_mail.png';
			$rep2             = 'assets/images/'.$filename2;
			$directory2       = str_replace("system/", $rep2, $base);
			
			$this->email->phpmailer->AddEmbeddedImage($directory2, 'logo_mail');
			
			$data['dateD_fr'] = $dateD_fr;
			$data['dateF_fr'] = $dateF_fr;
			
			$layout           = $this->load->view('front/mail/mail_recap.php',$data, true);
			
			$result           = $this->email->from("tolotra_si@vivetic.mg", "Outil d'aide à l'agent DELIVEROO")
				//->to("tolotra_si@vivetic.mg")
				->to("antoine.devos@vivetic.mg, methodes@vivetic.mg, deliveroo_encadrants@vivetic.com")
				->cc("tolotra_si@vivetic.mg")
				->subject("Recap du ".$dateD_fr." jusqu'au ".$dateF_fr." ce jour ".$date_now_fr)
				->attach($directory)
				->message($layout)
				->send();

			if($result)
			{
			    $log_data = "Recap mail bien envoyer : ".$dateD_fr." au ".$dateF_fr." ce ".$date_now_fr." ".PHP_EOL;
			    write_file($log, $log_data, 'a');

			}else{
			   	
			   	$log_data = "Recap mail Erreur envoi : ".$dateD_fr." au ".$dateF_fr." ce ".$date_now_fr." ".PHP_EOL;
			   	write_file($log, $log_data, 'a');
			   	show_error($this->email->print_debugger());
			}

		}else{

			$log_data = "Erreur de téléchargement pour le recap : ".$dateD_fr." au ".$dateF_fr." ce ".$date_now_fr." ".PHP_EOL;
			write_file($log, $log_data, 'a');
		
		}
	}
}

