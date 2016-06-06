<?php
Class User extends CI_Model{

public function createUser($username, $email, $password) {


		$sql = 'INSERT INTO cont_useri (id_user, username, email, pass) VALUES (seq_useri.NEXTVAL ,' .  $this->db->escape($username) .', '. $this->db->escape($email) .', '. $this->db->escape(md5($password)) .' )';
		$this->db->query($sql);

	}

public function login($username, $password) {

		$this->db->where('username', $username);
		$this->db->where('pass', md5($password));

		$result = $this->db->get('cont_useri');

		return $result->row_array();
	}



// public function user_delete($id_user){null;}


}
?>
