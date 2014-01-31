<?php

class Home extends CI_Controller {

	function index()
	{
          
  //  $data = array(
  //    'logged_in' => $this->ion_auth->logged_in()
  //  );
  //		$this->load->view('home', $data);

        $this->template->set('thispage','Home');
        $this->template->set('title','Great Plant Picks: Unbeatable Plants for the Maritime Northwest Garden');
        $this->template->load('template','home');
	}
}
