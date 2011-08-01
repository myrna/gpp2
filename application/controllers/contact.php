<?php

/**
 * Contact GPP
 * @subpackage	Controllers
 * @category		Controllers
 
 */

class Contact extends CI_Controller
{

	public function index()

	{
            $this->template->set('thispage','Contact');
            $this->template->set('title','Contact | Great Plant Picks');
            $this->template->load('template','contact');
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */