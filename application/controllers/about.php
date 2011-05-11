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

class About extends Controller
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
            $this->load->view('includes/header');
            $this->load->view('about');
            $this->load->view('includes/footer');
	}

}

/* End of file some.php */
/* Location: ./application/controllers/some.php */