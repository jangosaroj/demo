<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Come1 extends CI_Controller {

public function index() {


	if ($this->session->userdata('id')) {

           redirect('/come1/dashboard');
    }

	if(!$_POST){	
				return $this->load->view('login');	
	}
	
		$this->load->library('encrypt');
		try {

			//	$this->load->view('login');
				$member = Members1::create(array(
				'first_name' => $this->input->post('firstname')          ,
				'last_name' => $this->input->post('lastname')        ,
				'email' => $this->input->post('email')         ,
				'username' => $this->input->post('username')   ,
				'password' => $this->input->post('password') ,						
				));


		$member->save();

		echo "Member ".$member->first_name." ".$member->last_name."  was successfully created!";
		
		}
	
		catch (Members1FirstNameRequiredException $e) 
		{
			echo "A name is required to create a new member.";
		}
		 catch (Members1LastNameRequiredException $e) {
			echo "A last name is required to create a new member.";

		} 
		catch (Members1EmailRequiredException $e) {
			echo "An email is required to create a new member.";
		}
		 catch (Members1EmailInvalidException $e) {
			echo "The email address entered was not valid. Please enter a new one to continue.";
		}
		 catch (Members1EmailExistsException $e) {
			echo "The email address already exists.";
		}

		catch (UserPasswordRequiredException $e) {
		echo "The password field cannot be empty";
		}

		catch (UserUserNameRequiredException $e){

			echo "username required";
		}
			
		catch (UserUsernameExistsException $e){

		echo "the username already exists";
		}

	}

public function check(){

		$this->load->library('encrypt');



		if ($this->session->userdata('id')) {

           redirect('/come1/dashboard');
        }


			if(!$_POST)
			{	
				return $this->load->view('sign_in');	
			}

			try

			{
			if(!$user = User::find_by_username($this->input->post('username'))){
			
			}
           
			 $user->login($this->input->post('password'));
			 $this->session->set_userdata(array(
		     'id' => $user->member->id));

		$this->session->set_flashdata('alert_success', "Welcome back to the ".$user->member->first_name." Academy.");
        redirect('/come1/dashboard');
        }      			
		catch (UserPasswordNotMatchesException $e)
		{
			echo "password is not matching";

		}
}

public function logout() {
	
		$this->session->sess_destroy();
		redirect('come1/check');
}

public function dashboard(){

		$this->load->view('dashboard');

}



}
