<?php 
class Fte_processus extends CI_Model
{
	
	protected $table = 'fte_process';

	public function liste_processus($campid)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('campagne_id', $campid)
						->where('flag', 1)
						->order_by('ordre')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_processus_first($campid)
	{
		$rq = $this->db->select('fte_process_id')
						->from($this->table)
						->where('campagne_id', $campid)
						->where('flag', 1)
						->order_by('ordre','asc')
						->limit(1)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function liste_processus_dern($campid)
	{
		$rq = $this->db->select('fte_process_id, ordre')
						->from($this->table)
						->where('campagne_id', $campid)
						->where('flag', 1)
						->order_by('ordre','desc')
						->limit(1)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function get_processus_by_id($procid)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('fte_process_id', $procid)
						->where('flag', 1)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function ajouter_processus($data)
	{
		
		$this->db->insert($this->table,$data);
		return $this->db->insert_id();
    	
	}

	public function editer_processus($data_set, $id) {
		return $this->db->where("fte_process_id", $id)
						->update($this->table, $data_set);
	}
	
}