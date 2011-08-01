<?php

/**
 * About GPP
 * @subpackage	Controllers
 * @category		Controllers
 
 */

class Press extends CI_Controller
{

	public function index()

	{
            $this->template->set('thispage','Press');
            $this->template->set('title','Press | Great Plant Picks');
            $this->template->load('template','press');
	}

}

/* End of file press.php */
/* Location: ./application/controllers/press.php */