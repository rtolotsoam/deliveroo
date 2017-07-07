<?php


class Fte_histo_user_c_export extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('fte_histo_user_export','histo_export');
        $this->load->model('fte_processus','libelle');
        $this->load->model('fte_historique_view','vhist');
        $this->load->model('fte_traitement','trait');

        $this->load->library('excel');
        $this->load->library('style_export');
        
    }

    public function index($dateD,$dateF,$heureD,$heureF,$list_matr)
    {
        $this->export($dateD,$dateF,$heureD,$heureF,$list_matr);

    }

    public function export($dateD,$dateF,$heureD,$heureF,$list_matr)
    {


        $col_number     = 1;
        $liste_number   = 1;
        $count_row      = 0;

        $coul_Thead     = '#7bb989';
        $date_now       = date('Y-m-d H:i:s');

        $heading        = array('Matricule','Activité','Catégorie','Traitement','Processus','Sortie','Date début','date fin','Heure début', 'Heure fin');
        $date1          = $dateD;
        $date1fr          = implode("-", array_reverse(explode("/", $date1)));
        $date2          = $dateF;
        $date2fr          = implode("-", array_reverse(explode("/", $date2)));
        $list_matr      = $list_matr;

        $heureD = $heureD;
        $heureF = $heureF;


        $filename       = 'export_deliveroo_'.$date1fr.'__'.$date2fr.'_.xls';
        $listeColExcel  = $this->excel->liste_colExcel();
        $donnee_export  = $this->histo_export->histo_user_export($list_matr,$date1,$date2,$heureD,$heureF);
        
       
       $count_row       = count($donnee_export);

       if( $count_row > 0)
       {
            foreach($heading as $h){
            $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $h);
            $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)
                ->applyFromArray($this->style_export->background($coul_Thead))
                ->applyFromArray($this->style_export->font_color('FFFFFF'))
                ->applyFromArray($this->style_export->border_style('000000'));
            $col_number++;    
            }
            $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(60);
            $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(100);
            $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); 
            $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(15);
            $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); 
            $this->excel->getActiveSheet()->setTitle("delivero");
            $this->excel->getActiveSheet()->freezePane('B2');
             foreach ($donnee_export as $data) {
                $matricule_     = "";
                $activite_     = "";
                $categorie_     = "";
                $processus_     = "";
                $debutD_         = "";
                $finD_           = "";
                $debutH_         = "";
                $sortie_         = "";
                $finH_           = "";
                $libelle        = ""; 

                $matricule_     = $data->matricule;
                $processus_     = $data->etapes ; 
                $debutD_         = $data->debut_date;
                $finD_           = $data->fin_date;
                $debutH_         = $data->debut_heure;
                $finH_           = $data->fin_heure;
                $libelle        = $data->campagne_id; 
                $proc           = ascii_to_entities($processus_);
                $finale         = html_entity_decode($proc, ENT_COMPAT, 'UTF-8');
                $lib_fi         = ascii_to_entities($libelle);
                $lib_fi         = html_entity_decode($lib_fi, ENT_COMPAT, 'UTF-8');

                $categorie_     = $data->libelle_categorie;
                $categorie_     = ascii_to_entities($categorie_);
                $categorie_     = html_entity_decode($categorie_, ENT_COMPAT, 'UTF-8');

                $activite_      = $data->libelle_activite;
                $activite_      = ascii_to_entities($activite_);
                $activite_      = html_entity_decode($activite_, ENT_COMPAT, 'UTF-8');

                $sortie_ = $data->sortie;


                $col_number     = 1;
                $liste_number  += 1;

                // matricule
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $matricule_);
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)
                            ->applyFromArray($this->style_export->border_style('000000'))
                            ->applyFromArray($this->style_export->center());
                $col_number     +=1;


                // activite
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $activite_);
                $libellee = "" ;
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));            
                $col_number     +=1;


                // categorie
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $categorie_);
                $libellee = "" ;
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));            
                $col_number     +=1;

                // traitement
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $lib_fi);
                $libellee = "" ;
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));            
                $col_number     +=1;

                // processus
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $finale);
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->getAlignment()->setWrapText(true);
                $col_number     +=1;

                // sortie
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, $sortie_);
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));
                $col_number     +=1;

                //date debut
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, utf8_encode($debutD_));
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));
                $col_number     +=1;

                //date fin
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, utf8_encode($finD_));
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));
                $col_number     +=1;

                //heure debut
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, utf8_encode($debutH_));
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));
                $col_number     +=1;

                //heure fin
                $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, utf8_encode($finH_));
                $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)->applyFromArray($this->style_export->border_style('000000'));
                

            }
        
       }
       else
       {
            $this->excel->getActiveSheet()->setCellValue($listeColExcel[$col_number].$liste_number, "PAS DE DONNEES");
            $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(450);
            $this->excel->getActiveSheet()->getStyle($listeColExcel[$col_number].$liste_number)
                            ->applyFromArray($this->style_export->border_style('000000'))
                            ->applyFromArray($this->style_export->center())
                            ->applyFromArray($this->style_export->background($coul_Thead))
                            ->applyFromArray($this->style_export->font_color('FFFFFF'));
       }
       
        $objWriter      = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
        header( "Content-type: application/vnd.ms-excel; charset=UTF-8" );
        header('Content-Disposition: attachment;filename="'.$filename.'"');
        header('Cache-Control: max-age=0'); 
        $objWriter->save('php://output');
        
        exit();
    }


   
}