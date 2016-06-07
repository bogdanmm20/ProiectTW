<?php

class Admin extends CI_COntroller{


	public function index()
	{redirect(site_url('admin/personale'));
	}


	// TO DO
	public function add_personalres(){

		$this->load->view('adauga_locatie');

		if(isset($_POST['nume']) && isset($_POST['categorie']) && isset($_POST['latitudine']) && isset($_POST['longitudine']) && isset($_POST['oras']) && isset($_POST['tara']) && isset($_POST['descriere']) && !empty($_POST['nume']) && !empty($_POST['categorie']) && !empty($_POST['latitudine']) && !empty($_POST['longitudine']) && !empty($_POST['oras']) && !empty($_POST['tara'])&& !empty($_POST['descriere']))
		    {
		        $data['r.obiect.nume'] = $_POST['nume'];
		        $data['r.obiect.tip_res'] = $_POST['categorie'];
				$data['r.obiect.latitudine'] = $_POST['latitudine'];
				$data['r.obiect.longitudine'] = $_POST['longitudine'];
				$data['r.obiect.oras'] = $_POST['oras'];
				$data['r.obiect.id_tara'] = $_POST['tara'];
			    $data['r.obiect.descriere'] = $_POST['descriere'];

			}
		$this->load->model('resurse_model');
		$this->resurse_model->insert_resursa($data);
		var_dump($data);
	
	}

	public function del_personalres(){null;}


	public function personale($categ = FALSE) {

		$id_user=2;

		$this->load->model('resurse_model');
		
		$result= $this->resurse_model->getPersonale($categ, $id_user);


		 $data['resurces'] = $result;

		 $this->load->view('resurse_personale', $data);
	}


	// TO DO
	public function addfav($id_res)
	{
	//daca sesiunea e setata
	//daca nu ->login ; 
	//daca da-> ia id_user-ul
		// NU: 
		// DA:
		$id_user=2;

		$this->load->model('resurse_model');
		$this->resurse_model->addfav($id_res,$id_user);

		$this->favorite();

		}
	// TO DO
	public function delfav($id_res)
	{
		//daca sesiunea e setata
	//daca nu ->login ; 
	//daca da-> ia id_user-ul
		// NU: 
		// DA:
		$id_user=2;
		$this->load->model('resurse_model');
		$this->resurse_model->delfav($id_res,$id_user);

		
		$this->favorite();
	}


	public function favorite($categ = FALSE) {

		$id_user=2;

		$this->load->model('resurse_model');
		
		$result= $this->resurse_model->getFavorite($categ, $id_user);


		 $data['resurces'] = $result;

		 $this->load->view('resurse_favorite', $data);
	}

		//TO do a better view
	public function delete_resursa($id_res)
	{

		$this->load->model('resurse_model');

		$data['res'] = $this->resurse_model->get1($id_res);

		$this->load->view('admin_delete', $data);
		

		$this->resurse_model->delete($id_res);
	}

	public function edit_res($id_res){

		$this->load->model('resurse_model');

		$data['res'] = $this->resurse_model->get1($id_res);

		$this->load->view('admin_edit_res', $data);	
	}

}
?>