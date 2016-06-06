<?php

class Admin extends CI_COntroller{


	public function index()
	{redirect(site_url('admin/resources'));
	}


	// TO DO
	public function add_personalres(){

		$this->load->view('register');

		if(isset($_POST['nume']) && isset($_POST['categorie']) && isset($_POST['latitudine']) && isset($_POST['longitudine']) && isset($_POST['oras']) && isset($_POST['tara']) && isset($_POST['descriere']) && !empty($_POST['nume']) && !empty($_POST['categorie']) && !empty($_POST['latitudine']) && !empty($_POST['longitudine']) && !empty($_POST['oras']) && !empty($_POST['tara'])&& !empty($_POST['descriere']))
		    {
		        $data['userName'] = $_POST['nume'];
		        $data['userCategorie'] = $_POST['categorie'];
				$data['userLatitudine'] = $_POST['latitudine'];
				$data['userLongitudine'] = $_POST['longitudine'];
				$data['userOras'] = $_POST['oras'];
				$data['userTara'] = $_POST['tara'];
			    $data['userDescriere'] = $_POST['descriere'];

			}
		var_dump($data);
	}


	public function del_personalres(){null;}


	public function personale($categ = FALSE) {

		$this->load->model('resurse_modelresurse_modelresurse_model');
		//TO DO need replace  with getPersonal
		$result= $this->resurse_model->getAll($categ);


		 $data['resurces'] = $result;

		 $this->load->view('resurse_personale', $data);
	}

	public function favorite($categ = FALSE) {

		$this->load->model('resurse_modelresurse_model');
		//TO DO need replace  with getfavorite
		$result= $this->resurse_model->getAll($categ);


		 $data['resurces'] = $result;

		 $this->load->view('resurse_favorite', $data);
	}

	public function delete_resursa($id_res)
	{
		$this->load->model('resurse_model');

		$data['res'] = $this->resurse_model->get1($id_res);

		$this->load->view('admin_delete', $data);
		

		$this->resurse->delete($id_res);
	}

	public function edit_res($id_res){

		$this->load->model('resurse');

		$data['res'] = $this->resurse_model->get1($id_res);

		$this->load->view('admin_edit_res', $data);	
	}

}
?>