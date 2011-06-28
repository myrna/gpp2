<?php

/**
 * Database Administration Home Page
 *
 * Controller description...
 *
 * @package		GPP
 * @subpackage	Controllers
 * @category		Controllers
 * @author		mlo
 */

class Admin extends CI_Controller
{

	/**
	* Description
	*
	* @access public
	* @return void
	*/
	public function index()
	{
            $this->template->set('thispage','Database Administration');
            $this->template->set('title','Database Administration | Great Plant Picks');
            $this->template->load('template','admin');
	}

}

/* End of file some.php */
/* Location: ./application/controllers/some.php */