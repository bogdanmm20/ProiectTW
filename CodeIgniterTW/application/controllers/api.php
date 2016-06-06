<?php 

Class Api extends CI_Controller {

	public function index(){
		//redirect(site_url('api/get_res'));
		echo "API index Page";
	}

	public function categs_get($id = FALSE) {
		
		// if($id) {
		// 	$this->db->where('id', $id);
		// }

		$result= $this->db->get("CATEG")->result_array();
	
		echo json_encode($result);
		
	 }

	 public function resurces_get($categ = FALSE) {


		$this->load->model('resurse');
		$result= $this->resurse_model->getAll($categ);

		//print_r($result);
		//var_dump( $result);
		echo json_encode($result,JSON_PRETTY_PRINT);

	 }

	public function user_get(){ //login
		null;}

	public function users_get(){ //list of users 
		null;}

	public function user_post(){ // call createUser
		null;}

}



?>
