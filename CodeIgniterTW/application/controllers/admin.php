<?php

class Admin extends CI_COntroller{


	public function index()
	{redirect(site_url('admin/resources'));
	}


	// TO DO
	public function add_personalres(){null;}
	public function del_personalres(){null;}

	public function del_personalres(){null;}


	public function personale($categ = FALSE) {

		$this->load->model('resurse');
		//TO DO need replace  with getPersonal
		$result= $this->resurse->getAll($categ);


		 $data['resurces'] = $result;

		 $this->load->view('resurse_personale', $data);
	}

	public function favorite($categ = FALSE) {

		$this->load->model('resurse');
		//TO DO need replace  with getPersonal
		$result= $this->resurse->getAll($categ);


		 $data['resurces'] = $result;

		 $this->load->view('resurse_favorite', $data);
	}

	public function delete_resursa($id_res)
	{
		$this->load->model('resurse');

		$data['res'] = $this->resurse->get1($id_res);

		$this->load->view('admin_delete', $data);
		

		$this->resurse->delete($id_res);
	}

	public function edit_res($id_res){

		$this->load->model('resurse');

		$data['res'] = $this->resurse->get1($id_res);

		$this->load->view('admin_edit_res', $data);	
	}

}
?>