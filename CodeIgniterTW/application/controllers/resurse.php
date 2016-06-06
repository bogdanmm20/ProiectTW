<?php 

Class Resurse extends CI_Controller {

	public function index($categ = FALSE) {

		// if(!$user = $this->session->user) {
		// 	redirect(site_url('login'));
		// }

		$this->load->model('resurse_model');
		$result= $this->resurse_model->getAll($categ);

		 $data['resurces'] = $result;

		 $this->load->view('resurse', $data);
	 }
		
	 	public function res($id_res){

		$this->load->model('resurse_model');

		$data['res'] = $this->resurse_model->get1($id_res);

		$this->load->view('res', $data);	
	}
	
}

?>