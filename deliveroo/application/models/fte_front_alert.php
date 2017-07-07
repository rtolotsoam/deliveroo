<?php 
class Fte_front_alert extends CI_Model
{
	
	protected $table = 'vw_alert_front';
	
	public function alert_by_matr_n_cat($matricule,$categorie){
		$sql ="
		SELECT 
    *FROM vw_front_by_cat
   		where (matricule ilike '".$matricule.",%' 
   		or  matricule ilike '%,".$matricule."' 
   		or  matricule ilike '%toutes%' 
   		or matricule = '".$matricule."' or
   		matricule ilike '%,".$matricule.",%' )
   		and (categorie ilike '%".$categorie."%' or categorie ilike '%outes%')";

   		$query = $this->db->query($sql);

		return $query->result_array();
	}

	public function all_categorie($matricule){
		$sql ="
		SELECT *FROM vw_front_by_cat
   		where (matricule ilike '".$matricule.",%' 
   		or  matricule ilike '%,".$matricule."' 
   		or  matricule ilike '%toutes%' 
   		or matricule = '".$matricule."' or
   		matricule ilike '%,".$matricule.",%' )";

   		$query = $this->db->query($sql);

		return $query->result_array();
	}		
}