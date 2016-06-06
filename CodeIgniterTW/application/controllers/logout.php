<?php 

Class Logout extends CI_Controller {

	public function index() {

		$this->session->unset_userdata('user');
		redirect(site_url('login'));
	}

}

?>