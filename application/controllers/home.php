<?php

class Home extends Controller {

	function Home()
	{
		parent::Controller();
               
	}

	function index()
	{
          
  //  $data = array(
  //    'logged_in' => $this->ion_auth->logged_in()
  //  );
  //		$this->load->view('home', $data);

        $this->template->set('thispage','Home');
        $this->template->set('title','Home | Great Plant Picks');
        $this->template->load('template','home');
	}
}
