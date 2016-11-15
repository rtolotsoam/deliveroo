<?php 
class Fte_traitement extends CI_Model
{
	
	protected $table = 'fte_traitement';

	public function liste_traitement()
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('flag', 1)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_traitement_by_id($id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('fte_traitement_id', $id)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function liste_traitement_admin()
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_js($tratid)
	{
		$rq = $this->db->select('*')
						->from("fte_traitement_fonction")
						->where('traitement_id', $tratid)
						->get();
		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function ajouter_traitement($data)
	{
		
		$this->db->insert($this->table,$data);
    	return $this->db->insert_id();
    	
	}	

	public function liste_source()
	{
		$rq = $this->db->select('source_info')
					->from($this->table)
					->group_by('source_info')
					->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function supprimer_traitement($id, $data){
		return $this->db->where('fte_traitement_id', $id)
				->update($this->table, $data); 	

	}

	public function modifier_traitement($id, $data){
		return $this->db->where('fte_traitement_id', $id)
				->update($this->table, $data); 	

	}
	
}