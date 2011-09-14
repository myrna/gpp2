<?php

/**
 * Program Name
 *
 * @package		Program Name
 * @author		Author Name
 * @copyright		Copyright (c) 2009
 * @link			web address
 * @since			Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Some Controller
 *
 * Controller description...
 *
 * @package		Program Name
 * @subpackage	Controllers
 * @category		Controllers
 * @author		Author Name
 */

class Resources extends CI_Controller
{

	/**
	* Description
	*
	* @access public
	* @return void
	*/
	public function index()

	{
            $this->template->set('thispage','Resources');
            $this->template->set('title','Resources | Great Plant Picks');
            $this->template->load('template','resources');
	}

        public function links()
        {
            $this->template->set('thispage','Helpful Links');
            $this->template->set('title','Helpful Links | Great Plant Picks');
            $this->template->load('template','resources/links');
        }

        public function glossary()
        {
            $this->template->set('thispage','Glossary');
            $this->template->set('title','Glossary | Great Plant Picks');
            $this->template->load('template','resources/glossary');
        }
}

/* End of file some.php */
/* Location: ./application/controllers/some.php */