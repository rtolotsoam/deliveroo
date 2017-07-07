<?php 
class Fte_notification extends CI_Model
{
	
	protected $table = 'fte_notification';
	protected $table_etat = 'fte_etat_notification';

	public function liste_notification()
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('flag', 1)
						->order_by('datetime_modif', 'desc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_notification_by_id($id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('id_notification', $id)
						->where('flag', 1)
						->order_by('datetime_modif', 'desc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function ajouter_notification($data_notification) {
		return $this->db->insert($this->table, $data_notification);
	}

	public function ajouter_etat($data_etat) {
		return $this->db->insert($this->table_etat, $data_etat);
	}


	public function liste_notification_by_matricule($matricule){

		$rq = $this->db->query("
				select 
					* 
				from 
					fte_notification 
				where 
					id_notification not in (
						select 
							id_notification 
						from 
							fte_etat_notification 
						where 
							matricule = ".$matricule."
						) ORDER BY datetime_modif DESC");

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


		
}
