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

class Admin extends Controller
{

	/**
	* Constructor
	*/
	public function __construct()
	{
		parent::Controller();
	}


	// ------------------------------------------------------------------------


	/**
	* Description
	*
	* @access public
	* @return void
	*/
	public function index()
	{
            $this->load->view('admin');
	}

}

/* End of file some.php */
/* Location: ./application/controllers/some.php */