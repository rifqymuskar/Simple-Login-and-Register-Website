<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	// routing
	public function users($action="")
	{
		$action = $action."_".$this->router->fetch_method();
		$data = $this->input->post(null, true);

		$this->$action($data);			
	}

	// proccess table login
	private function check_users($data)
	{
		$this->db->where('username', $data['username']);
		$this->db->where('password', md5($data['password']));
		$this->db->where('status', 'active');
		$q = $this->db->get('users')->num_rows();
		if($q > 0){

			$this->session->set_userdata('username', $data['username']);

			echo json_encode(array('res' =>  'Succes Login', 'stat' => site_url('home')));
		}else{
			echo json_encode(array('res' =>  'Username and Password is invalid', 'stat' => 'false'));
		}	
	}
	private function insert_users($data)
	{
		$this->form_validation->set_rules('fullname', 'fullname', 'required|min_length[5]');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('username', 'username', 'required|min_length[5]|max_length[12]|is_unique[users.username]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[5]|max_length[12]');
		$this->form_validation->set_rules('passconf', 'passconf', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
			echo json_encode(array('res' =>  validation_errors(), 'stat' => 'false'));
		}else{
			$email = $data['email'];
			$data['password'] = md5($data['password']);

			$data['token'] = $this->generateRandomString($data['password']);
			unset($data['passconf']);

			$data['status'] = 'unactive';

			$this->db->insert('users', $data);

			$users_id = $this->db->insert_id();
			$confirmation = $this->confirmation_email($email, $users_id, $data['token']);
			if($confirmation){
				redirect();
				echo json_encode(array('res' =>  'Please Confirm Your Email Address to Complete Your registration', 'stat' => site_url('login')));
			}else{
				echo json_encode(array('res' =>  'terjadi kesalahan pada sistem', 'stat' => 'false'));
			}

		}

		//echo json_encode($data);
	}
	// proccess table login

	public function confirmation_email($email="", $users_id="", $token="", $data=array())
	{
		$this->load->library('email');
		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['smtp_user'] = "rifqymuskar@gmail.com"; 
		$config['smtp_pass'] = "27250311r";
		$config['mailtype'] = "html";
		$config['charset'] = "iso-8859-1";
		$config['newline'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from('rifqymuskar@gmail.com', 'Administrator');
		$this->email->to($email);
		//$this->email->reply_to('rifqymuskar@gmail.com', 'Explendid Videos');
		$this->email->subject('Confirmation Account');

		$data['link'] = site_url('ajax/active_email/'.$token.$users_id);

		$body = $this->load->view('login/email.php', $data, TRUE);
		$this->email->message($body);

	      	if($this->email->send()){
		      	return true;
		     }
		     else{
		     	return false;
		    }		
	}

	private function generateRandomString($characters="") 
	{
	    $charactersLength = strlen($characters);
	    $length = 20;
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}

	public function active_email($token)
	{
		$id = substr($token, 20);
		$token = substr($token, 0, 20);
		$q = $this->db->where('id', $id)->where('token', $token)->get('users')->num_rows();
		if($q > 0){
			$this->db->set('status', 'active', true)->where('id', $id)->update('users');

			redirect(site_url('login/index/Your Account is active'));
		}else{
			echo 'token is expired';
		}
	}

}	