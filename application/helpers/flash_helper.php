<?php

/**
 * Program Name
 *
 * @package		Program Name
 * @author		Author name
 * @copyright		Copyright (c) 2009
 * @link			http://www.your-url.com
 * @since			Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Flash Helper
 *
 * Provide helper functions for common flash message operations.
 *
 * @package		Program Name
 * @subpackage	Helpers
 * @category		Helpers
 * @author		Author name
 */


/**
* Display formatted flash message.
*
* @access public
* @param string
* @return string
*/
function display_flash($name)
{
	$CI =& get_instance();

	if($CI->session->flashdata($name))
	{
		$flash = $CI->session->flashdata($name);
		return '<div id="' . $flash['type'] . '">' . $flash['msg'] . '</div>';
	}
}


/**
* Save provided message as a flash variable.
*
* @access public
* @param string
* @param string
* @param string
* @return string
*/
function set_flash($name, $type, $msg)
{
	$CI =& get_instance();
	$CI->session->set_flashdata($name, array('type' => $type, 'msg' => $msg));
}

/* End of file flash_helper.php */
/* Location: ./application/helpers/flash_helper.php */
