<?php 
const PIZZERIE=', TREAT(obiect AS pizzerie).telefon, TREAT(obiect AS pizzerie).website '; 
const BANCA= ', TREAT(obiect AS banca).telefon, TREAT(obiect AS banca).program_de_lucru ';


Class Resurse extends CI_Model {

	public function get1( $id_res =FALSE){
		
		$categ=FALSE;

		$this->db->where('r.id_res', $id_res);
		$this->db->select('r.id_res, r.obiect.tip_res tip_res');

		$result= $this->db->get('resurse_oop r');

		$categ= $result->row_array()["TIP_RES"];
		

		$query = "SELECT r.id_res, r.obiect.nume nume, r.obiect.tip_res tip_res, 
		r.obiect.latitudine latitudine, r.obiect.longitudine,
		r.obiect.adresa_strazii, r.obiect.cod_postal,
		r.obiect.oras oras,r.obiect.id_tara,
		r.obiect.descriere descriere  , r.id_user ";

		if(!$categ === FALSE)
		{	
			switch ($categ) 
			{
    		case "pizzerie":
        		$query= $query . PIZZERIE ;
        		break;
		    case "banca":
		        $query= $query . BANCA ;
		        break;

		    default:
        		break;
			}
		}

		$query= $query . "FROM resurse_oop r ";

		if(!$id_res === FALSE)
		{
			$query= $query . 'where '; 
			$query= $query . " r.id_res = '" . $id_res ."'" ; 
		}

		$result= $this->db->query($query);
		
		return $result->row_array();
	}

	public function getAll( $categ=FALSE) {

		$query = "SELECT r.id_res, r.obiect.nume nume, r.obiect.tip_res tip_res, 
		r.obiect.latitudine latitudine, r.obiect.longitudine,
		r.obiect.adresa_strazii, r.obiect.cod_postal,
		r.obiect.oras oras,r.obiect.id_tara,
		r.obiect.descriere descriere  , r.id_user ";

		if(!$categ === FALSE)
		{	
			switch ($categ) 
			{
    		case "pizzerie":
        		$query= $query . PIZZERIE ;
        		break;
		    case "banca":
		        $query= $query . BANCA ;
		        break;

		    default:
        		break;
			}
		}

		$query= $query . "FROM resurse_oop r ";

		if(!$categ === FALSE)
		{
			$query= $query . 'where '; 
			$query= $query . " r.obiect.tip_res = '" . $categ ."'" ; 
		}


		$result= $this->db->query($query);

		
		return $result->result_array();

	}

	public function insert_resursa($id_res){
		
	}

	public function add_to_fav($id_res){null;}

	public function delete_resursa($id_res)
	{
		if($id_res){	
			$this->db->where('id_res', $id_res);
			$this->db->delete('resurse_oop');
			}
	}



	// public function delete($id) {

	// 	$this->db->where('id_res', $id);
	// 	$this->db->delete('posts');

	// }

}

?>