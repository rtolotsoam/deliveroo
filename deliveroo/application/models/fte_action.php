<?php 
class Fte_action extends CI_Model
{
	
	protected $table = 'fte_action';

	public function liste_action($procid)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('process_id', $procid)
						->where('flag', 1)
						->order_by('fte_action_id', 'desc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}
	
	public function liste_js_action($traitement)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('traitement_id', $traitement)
						->where('action_js is NOT NULL', NULL, FALSE)
						->get();
		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function ajouter_action($data_action) {
		return $this->db->insert($this->table, $data_action);
	}



	public function editer_action($id, $data) {
		return $this->db->where("fte_action_id", $id)
						->update($this->table, $data);
	}
		
}