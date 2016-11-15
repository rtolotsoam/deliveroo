<?php 
class Fte_historique_view extends CI_Model
{
	
	protected $table = 'vw_historique';

	public function liste_historique_vw()
	{
		$rq = $this->db->select('*')
						->from($this->table)
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
	
}