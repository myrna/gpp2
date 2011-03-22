<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();
	}

	function index()
	{
    $data = array(
      'logged_in' => $this->ion_auth->logged_in()
    );
		$this->load->view('home', $data);
	}
}