<?php 

// REPRESENTATION DE LA TABLE (fte_user)
class Fte_user extends CI_Model
{
	
	protected $table = 'fte_user';

	// TRAITEMENT DE L'AUTHENTIFICATION
	public function verifier_login($mle, $pass)
	{
		$rq = $this->db->select('matricule, pass, level, access_1, access_2, access_3, access_4, prenom, gestion_process, gestion_user')
						->from($this->table)
						->where('matricule', $mle)
						->where('pass', $pass)
						->where('statut', 1)
						->where('flag', 1)
						->limit(1)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function liste_utilisateur()
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


	public function ajouter_user($data_user) {
		return $this->db->insert($this->table, $data_user);
	}


	public function editer_user($id, $data) {
		return $this->db->where("fte_user_id", $id)
						->update($this->table, $data);
	}
	
}