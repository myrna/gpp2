<?php

/**
 * Contact GPP
 * @subpackage	Controllers
 * @category		Controllers
 
 */

class Sitemap extends CI_Controller
{

	public function index()

	{
            $this->template->set('thispage','Site Map');
            $this->template->set('title','Site Map | Great Plant Picks');
            $this->template->load('template','sitemap');
	}

}

/* End of file contact.php */
/* Location: ./application/controllers/contact.php */