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

        public function news()

	{
            $this->template->set('thispage','In The News');
            $this->template->set('title','In The News | Great Plant Picks');
            $this->template->load('template','press/news');
	}

        public function media()

	{
            $this->template->set('thispage','Media Contacts');
            $this->template->set('title','Media Contacts | Great Plant Picks');
            $this->template->load('template','press/media');
	}

        public function terms()

	{
            $this->template->set('thispage','Terms of Use');
            $this->template->set('title','Terms of Use | Great Plant Picks');
            $this->template->load('template','press/terms');
	}

}

/* End of file press.php */
/* Location: ./application/controllers/press.php */