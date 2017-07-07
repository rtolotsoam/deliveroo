<?php 
class Fte_histo_user_export extends CI_Model
{
	protected $table     = 'vw_historique_export2';
	protected $data_info = 'matricule, libelle_activite, libelle_categorie, campagne_id, etapes, sortie,debut_date,fin_date,debut_heure,fin_heure';

	public function histo_user_export($matr,$dateD,$dateF,$heureD,$heureF)
	{
		$rq = $this->db->select($this->data_info)->from($this->table);
		if($matr !="" && $matr !="null" && $matr !="NULL") {
			$array_matr = explode(",",$matr); 
			$requete = array();
			foreach ($array_matr as $val) {
				
				if($val!= ""){
					array_push($requete, $val);
				}
			}
			$rq		    = $this->db->where_in('matricule', $requete);
		}
		if ($dateD !="" && $dateF !="") {
			$rq			= $this->db->where('debut_date_1 BETWEEN \''.$dateD.'\' AND \''.$dateF.'\'', null, false);
		}
		if ($heureD !="" && $heureF !="") {
			$rq			= $this->db->where('debut_heure_1 BETWEEN \''.$heureD.'\' AND \''.$heureF.'\'', null, false);
		}

		$rq 			= $this->db->order_by('matricule','asc');
		$rq 			= $this->db->get();
		
		if( $rq->num_rows > 0 ){
				return $rq->result();
			}
	}
	
}