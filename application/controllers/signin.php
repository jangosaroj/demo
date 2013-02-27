<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Signin extends CI_Controller {
public function index()
{
	if($_SERVER['REQUEST_METHOD'] !== 'POST')
			{	
				return $this->load->view('sign_in');	
			}
	 	 echo "test";

}			
}