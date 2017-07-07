<?php 
class Fte_categories extends CI_Model
{
	
	protected $table = 'fte_categories';

	public function liste_categories()
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->order_by('fte_categories_id', 'asc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function search($id, $critere)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('parent_id IN (select fte_categories_id from '.$this->table.' where parent_id ='.$id.')', null, false)
						->where('flag', 1)
						->where('traitement_id !=', 0)
						->ilike('libelle_categories', $critere)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_categories_by_id($id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('fte_categories_id', $id)
						->where('flag', 1)
						->order_by('fte_categories_id', 'asc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function liste_categories_by_traitement_id($id)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('traitement_id', $id)
						->where('flag', 1)
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function liste_categories_by_niveau($niveau)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('niveau', $niveau)
						->where('flag', 1)
						->order_by('fte_categories_id', 'asc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function liste_categories_by_parent($parent)
	{
		$rq = $this->db->select('*')
						->from($this->table)
						->where('parent_id', $parent)
						->where('flag', 1)
						->order_by('fte_categories_id', 'asc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}


	public function ajouter_sous_categories($data)
	{
		
		$this->db->insert($this->table, $data);
    	return $this->db->insert_id();
    	
	}


	public function editer_categories($id, $data) {
		return $this->db->where("fte_categories_id", $id)
						->update($this->table, $data);
	}

	public function editer_categories_parent_id($id, $data) {
		return $this->db->where("parent_id", $id)
						->update($this->table, $data);
	}

	public function hierarchie($process_id){
		
		$rq = $this->db->query("
					select 
						libelle_categories, niveau
					from 
						fte_categories 
					where 
						traitement_id =(
								select 
									campagne_id 
								from 
									fte_process 
								where 
									fte_process_id =".$process_id."
						)
						OR
						fte_categories_id = (
							select 
								parent_id
							from 
								fte_categories 
							where 
								traitement_id =(
										select 
											campagne_id 
										from 
											fte_process 
										where 
											fte_process_id =".$process_id."
											)
						)
						OR
						fte_categories_id = (
							select 
								parent_id 
							from 
								fte_categories 
							where 
							fte_categories_id =
								(
									select 
										parent_id
									from 
										fte_categories 
									where 
										traitement_id =(
												select 
													campagne_id 
												from 
													fte_process 
												where 
													fte_process_id =".$process_id."
													)
								)
						)
						ORDER BY niveau ASC");

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function hierarchie2($categ_id){

		$rq = $this->db->query("
					select
						libelle_categories,
						niveau
					from
						fte_categories
					where
						fte_categories_id =(
								select 
									parent_id 
								from 
									fte_categories 
								where
									fte_categories_id = ".$categ_id."
								)
						ORDER BY niveau ASC

			");

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function hierarchie3($categ_id){

		$rq = $this->db->query("
				select
					libelle_categories,
					niveau
				from
					fte_categories
				where
					fte_categories_id =(
							select 
								parent_id 
							from 
								fte_categories 
							where
								fte_categories_id = ".$categ_id."
							)
					OR
					fte_categories_id = (
							select
								parent_id
							from
								fte_categories
							where
								fte_categories_id =(
										select 
											parent_id 
										from 
											fte_categories 
										where
											fte_categories_id = ".$categ_id."
										)
					)
					ORDER BY niveau ASC
			");

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}

	public function get_libelle_activite($id){


		$rq = $this->db->query("
					SELECT res.libelle_categories::text AS libelle_activite
			           FROM ( SELECT fte_categories.fte_categories_id,
			                    fte_categories.libelle_categories,
			                    fte_categories.niveau,
			                    fte_categories.parent_id,
			                    fte_categories.traitement_id,
			                    fte_categories.contenu_categorie,
			                    fte_categories.flag,
			                    10 AS test
			                   FROM fte_categories
			                  WHERE fte_categories.fte_categories_id = (( SELECT fte_categories_1.parent_id
			                           FROM fte_categories fte_categories_1
			                          WHERE fte_categories_1.fte_categories_id = (( SELECT fte_categories_2.parent_id
			                                   FROM fte_categories fte_categories_2
			                                  WHERE fte_categories_2.niveau = 3 AND fte_categories_2.traitement_id = ".$id." )) AND fte_categories_1.niveau = 2))) res
			             LEFT JOIN ( SELECT fte_categories.fte_categories_id,
			                    fte_categories.libelle_categories,
			                    fte_categories.niveau,
			                    fte_categories.parent_id,
			                    fte_categories.traitement_id,
			                    fte_categories.contenu_categorie,
			                    fte_categories.flag,
			                    10 AS test1
			                   FROM fte_categories
			                  WHERE fte_categories.fte_categories_id = (( SELECT fte_categories_1.parent_id
			                           FROM fte_categories fte_categories_1
			                          WHERE fte_categories_1.niveau = 3 AND fte_categories_1.traitement_id = ".$id." )) AND fte_categories.niveau = 2) res2 ON res2.test1 = res.test
				");


        if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;

	}


	public function get_libelle_categories($id){


		$rq = $this->db->query("
					SELECT res2.libelle_categories::text AS libelle_categorie
			           FROM ( SELECT fte_categories.fte_categories_id,
			                    fte_categories.libelle_categories,
			                    fte_categories.niveau,
			                    fte_categories.parent_id,
			                    fte_categories.traitement_id,
			                    fte_categories.contenu_categorie,
			                    fte_categories.flag,
			                    10 AS test
			                   FROM fte_categories
			                  WHERE fte_categories.fte_categories_id = (( SELECT fte_categories_1.parent_id
			                           FROM fte_categories fte_categories_1
			                          WHERE fte_categories_1.fte_categories_id = (( SELECT fte_categories_2.parent_id
			                                   FROM fte_categories fte_categories_2
			                                  WHERE fte_categories_2.niveau = 3 AND fte_categories_2.traitement_id = ".$id." )) AND fte_categories_1.niveau = 2))) res
			             LEFT JOIN ( SELECT fte_categories.fte_categories_id,
			                    fte_categories.libelle_categories,
			                    fte_categories.niveau,
			                    fte_categories.parent_id,
			                    fte_categories.traitement_id,
			                    fte_categories.contenu_categorie,
			                    fte_categories.flag,
			                    10 AS test1
			                   FROM fte_categories
			                  WHERE fte_categories.fte_categories_id = (( SELECT fte_categories_1.parent_id
			                           FROM fte_categories fte_categories_1
			                          WHERE fte_categories_1.niveau = 3 AND fte_categories_1.traitement_id = ".$id."  )) AND fte_categories.niveau = 2) res2 ON res2.test1 = res.test
				");


        if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;

	}



	public function liste_categories_process()
	{
		$rq = $this->db->select('traitement_id,libelle_categories,parent_id')
						->from($this->table)
						->where('flag', 1)
						->where('traitement_id <>', 0)
						->where('niveau', 3)
						->order_by('parent_id', 'asc')
						->get();

		if( $rq->num_rows > 0 ){
			return $rq->result();
		}
		return false;
	}
		
}