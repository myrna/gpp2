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

}

/* End of file some.php */
/* Location: ./application/controllers/some.php */