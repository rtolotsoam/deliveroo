<?php 

class Fte_histo_user extends CI_Model
{
	
	public function liste_user_in_histo($col)  /*liste user qui ont des historique*/
	{
		$rq = $this->db->select($col)
					   ->from('fte_historique')
					   ->join('fte_user', 'fte_user.matricule = fte_historique.matricule','inner')
					   ->distinct('fte_historique.matricule')
					   ->order_by('fte_historique.matricule','asc')
					   ->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

}