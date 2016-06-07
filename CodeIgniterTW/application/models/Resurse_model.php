<?php 
const PIZZERIE=', TREAT(obiect AS pizzerie).telefon, TREAT(obiect AS pizzerie).website '; 
const BANCA= ', TREAT(obiect AS banca).telefon, TREAT(obiect AS banca).program_de_lucru ';


Class Resurse_model extends CI_Model {

	public function get1($id_res =FALSE){
		
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
	
	//TO DO
	public function getPersonale($categ=FALSE, $id_user)
	{
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
		$query= $query . 'where '; 
		$query= $query . "r.id_user ='" . $id_user ."' " ; //personal

		if(!$categ === FALSE)
		{
			$query= $query . "and r.obiect.tip_res = '" . $categ ."'" ; 
		}


		$result= $this->db->query($query);

		
		return $result->result_array();
		
	}
	//TO DO
	public function getFavorite($categ=FALSE, $id_user)
	{
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

		$query= $query . "FROM resurse_oop r 
		join resursefav rf on r.id_res= rf.id_res 
		join cont_useri c on c.id_user = rf.id_user ";
		$query= $query . 'where '; 
		$query= $query . "rf.id_user ='" . $id_user ."' " ; //favorite

		if(!$categ === FALSE)
		{
			$query= $query . "and r.obiect.tip_res = '" . $categ ."'" ; 
		}


		$result= $this->db->query($query);

		
		return $result->result_array();
	}

	// TO DO
	// public function insert_resursa($data){

	// 			$categ=FALSE;

		

	// 	$query = "insert into resurse_oop r(id_res, r.obiect, id_user) values (seq_resurse.nextval, ";

	// 	if(!$categ === FALSE)
	// 	{	
	// 		switch ($categ) 
	// 		{
 //    		case "pizzerie":
 //        		$query= $query . "PIZZERIE( )" ;
 //        		break;
	// 	    case "banca":
	// 	        $query= $query . BANCA ;
	// 	        break;

	// 	    default:
	// 	    	$query= $query . "resursa(v_nume,  );";
 //        		break;
	// 		}
	// 	}

	// 	for ($row = 0; $row < 7; $row++)


	// 	r.id_res, r.obiect.nume nume, r.obiect.tip_res tip_res, 
	// 	r.obiect.latitudine latitudine, r.obiect.longitudine,
	// 	//r.obiect.adresa_strazii, r.obiect.cod_postal,
	// 	r.obiect.oras oras,r.obiect.id_tara,
	// 	r.obiect.descriere descriere  , r.id_user

	// 	r.obiect.nume nume, r.obiect.tip_res tip_res, 
	// 	r.obiect.latitudine latitudine, r.obiect.longitudine,
	// 		$this->db->set('id_res', $name);
	// 		$this->db->set('title', $title);
	// 		$this->db->set('status', $status);
	// 		$this->db->insert('mytable');

	// 		$this->db->insert('resurse_oop r', $data);
		
 //      pizzerie(v_nume, dbms_random.value(43,48), dbms_random.value(20,29), 
 //      localitat, to_char(dbms_random.value(111111111,999999999), '999999999')), 2  );

	// 		$stid = oci_parse($conn, 'insert into resurse_oop r(id_res, r.obiect, id_user) VALUES(seq_resurse.nextval, resursa(v_nume,  );'


	// 		$r = oci_execute($stid);
	// 		oci_free_statement($stid);
	// }

	// TO DO
	public function addfav($id_res,$id_user)
	{
		$this->db->set('id_user', $id_user);
		$this->db->set('id_res', $id_res);
		$this->db->insert('resursefav');
	}
	// TO DO
	public function delfav($id_res,$id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->where('id_res', $id_res);
		$this->db->delete('resursefav');
	}



	public function delete($id_res=FALSE)
	{
		if($id_res){	
			$this->db->where('id_res', $id_res);
			$this->db->delete('resurse_oop r');
			}
	}

}

?>