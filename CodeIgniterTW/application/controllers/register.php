<?php 

Class Register extends CI_Controller {

	public function index() {

		// if($user = $this->session->user) {
		// 	redirect(site_url('resurse'));
		// }
 		// $this->load->helper(array('form', 'url'));
 		// $this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Uname', 'required|trim|is_unique[cont_useri.username]');

		$this->form_validation->set_rules('email', 'EMAIL', 'required|valid_email|trim');

		$this->form_validation->set_rules('password', 'Parolaaaaa', 'required|min_length[3]');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('register');
		}
		else
			{$this->load->model('user');
			 $this->user->createUser( $this->input->post('username'), $this->input->post('email'), $this->input->post('password'));
			redirect(site_url('login'));
			}
	}	


	

}

?>