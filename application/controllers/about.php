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

        public function criteria()

        {
            $this->template->set('thispage','Selection Criteria');
            $this->template->set('title','GPP Selection Criteria | Great Plant Picks');
            $this->template->load('template','about/criteria');
        }

        public function committee()

        {
            $this->template->set('thispage','Selection Committee');
            $this->template->set('title','GPP Selection Committee | Great Plant Picks');
            $this->template->load('template','about/committee');
        }

        public function advisory()

        {
            $this->template->set('thispage','Advisory Groups');
            $this->template->set('title','GPP Advisory Groups | Great Plant Picks');
            $this->template->load('template','about/advisory');
        }

        public function staff()

        {
            $class = "GPP Staff";
            $this->template->set('thispage','GPP Staff');
            $this->template->set('title','GPP Staff | Great Plant Picks');
            $this->template->load('template','about/staff');
        }

}

/* End of file about.php */
/* Location: ./application/controllers/about.php */