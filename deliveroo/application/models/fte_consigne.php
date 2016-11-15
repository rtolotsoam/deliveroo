<?php 
class Fte_consigne extends CI_Model
{
	
	protected $table = 'fte_consigne';

	public function liste_consigne($process_id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('process_id', $process_id)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}
	
}