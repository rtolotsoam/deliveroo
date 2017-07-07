<?php 

class Fte_alerte_zone extends CI_Model
{
	
	public function liste_zone() 
	{
		$rq = $this->db->select('*')
					   ->from('fte_alerte_zone')
					   ->order_by('region','asc')
					   ->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	function enfant_zone($i_zone)
	{
		$rq = $this->db->select('*')
					   ->from('fte_alerte_zone')
					   ->where('region_parent', $i_zone)
					   ->order_by('region','asc')
					   ->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}
	public function liste_type()
	{
		$rq = $this->db->select('*')
					   ->from('fte_alert_type')
					   ->order_by('type','asc')
					   ->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

}