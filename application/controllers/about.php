<?php

/**
 * About GPP
 * @subpackage	Controllers
 * @category		Controllers
 
 */

class About extends CI_Controller
{

	public function index()

	{
            $this->template->set('thispage','About GPP');
            $this->template->set('title','About GPP | Great Plant Picks');
            $this->template->load('template','about');
	}

}

/* End of file about.php */
/* Location: ./application/controllers/about.php */