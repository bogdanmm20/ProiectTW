<?php 

Class Login extends CI_Controller {

	public function index() {

	
		// if(!$user = $this->session->user) {
		// 	redirect(site_url('api/resurces'));
		// }


		$this->form_validation->set_rules('username', 'Uname', 'required|trim');

		$this->form_validation->set_rules('password', 'Parolaaaaa', 'required');

		if($this->form_validation->run() === FALSE) {
			$this->load->view('login');
		} else {
			$this->load->model('user');
			if($user = $this->user->login($this->input->post('username'), $this->input->post('password')) ) {
				// delete password from user first
				$this->session->set_userdata('user', $user);
				
				redirect(site_url('resurse'));
			} else {
				$this->load->view('login');
			}
		}
	}
}
?>