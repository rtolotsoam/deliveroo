<?php 
class Fte_historique extends CI_Model
{
	
	protected $table = 'fte_historique';

	public function liste_historique($session_id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('session_id', $session_id)
						->order_by('fte_historique_id')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function ajouter_historique($procid, $sessid, $flag, $mle)
	{
		$this->db->set('process_id', (int) $procid);
		$this->db->set('session_id', $sessid);
		$this->db->set('flag', $flag);
		$this->db->set('matricule', $mle);
		return $this->db->insert($this->table);
	}


	public function abort_historique($sessid)
	{
		try {
			$res_max  = -1;
			$rq = $this->db->select('*')
							->from($this->table)
							->where('session_id', $sessid)
							->where('flag', '1')
							->order_by('fte_historique_id','desc')
							->limit(1)
							->get();
			if( $rq->num_rows > 0 ){
				$rsm = $rq->result();			
				$res_max  = $rsm[0]->process_id;
			}
			
			$this->db->set('flag', '0');
			$this->db->where('session_id', $sessid);
			$this->db->where('flag', '1');
			$this->db->where('process_id',$res_max);
			$this->db->update($this->table);
			
			$rq = $this->db->select('*')
							->from($this->table)
							->where('session_id', $sessid)
							->where('flag', '1')
							->order_by('fte_historique_id','desc')
							->limit(1)
							->get();
			if( $rq->num_rows > 0 ){
				return $rq->result();
			}
		}
		catch (Exception $e) {}
		return false;		
	}

	public function last_historique($session_id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('session_id', $session_id)
						->order_by('fte_historique_id','desc')
						->get();
		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function last_ok($session_id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('session_id', $session_id)
						->where('flag', '1')
						->order_by('fte_historique_id','desc')
						->limit(1)
						->get();
		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}
	
}