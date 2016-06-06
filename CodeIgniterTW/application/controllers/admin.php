<?php

class Admin extends CI_COntroller{


	public function index()
	{redirect(site_url('admin/resources'));
	}

	public function create_resource(){null;}

	public function resources($categ = FALSE) {

		$this->load->model('resurse');
		$result= $this->resurse->getAll($categ);


		 $data['resurces'] = $result;

		 $this->load->view('admin_resurse', $data);

	}

	public function delete_resursa($id_res)
	{
		$this->load->model('resurse');

		$data['res'] = $this->resurse->get1($id_res);

		$this->load->view('admin_delete', $data);
		

		$this->resurse->delete_resursa($id_res);
	}

	public function edit_res($id_res){

		$this->load->model('resurse');

		$data['res'] = $this->resurse->get1($id_res);

		$this->load->view('admin_edit_res', $data);	
	}

}
?>