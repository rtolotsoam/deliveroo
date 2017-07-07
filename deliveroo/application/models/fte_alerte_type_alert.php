<?php 
	
	class Fte_alerte_type_alert extends CI_Model
	{
		public function all_type() 
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

		public function get_type_alert($id) 
		{
			$rq = $this->db->select('*')
						   ->from('fte_alert_type')
						   ->where('id_type',$id)
						   ->get();

			if( $rq->num_rows > 0 ){
				return $rq->result();
			}
			return false;
		}
	}

?>