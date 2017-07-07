<?php 
class Fte_historique_view extends CI_Model
{
	
	protected $table = 'vw_historique';

	public function liste_historique_vw()
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->order_by('matricule', 'ASC')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_historique_vwByMle($mle)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('matricule', $mle)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function nbr_consulation($id, $dateD, $dateF){

		$rq = $this->db->query("
			SELECT 
				count(*) AS nbr
			FROM ".$this->table." 
			WHERE campagne_id = ".$id." 
					and 
				debut_date_1 BETWEEN '".$dateD."' and '".$dateF."'
			");

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;

		 
	}

	public function total_nbr_consultation($dateD, $dateF)
	{
		$rq = $this->db->query("
				SELECT 
					count(*) AS total_nbr
				FROM ".$this->table." 
				WHERE 
					debut_date_1 BETWEEN '".$dateD."' and '".$dateF."'
				");

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}
	
}