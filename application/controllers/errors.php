<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errors extends CI_Controller {

	/**
	 * error_404
	 * ------------------------------------------------------------------------
	 *
	 * Function to replace the generic 404 error page
	 * allowing you to use the template layout for your 404 page
	 *
	 * Ensure this is set in
	 * ./application/cconfig/routes.php
	 * $route['404_override'] = 'errors/error_404';
	 */
	function error_404()
	{
		// display the view
           $this->load->view('errors/error_404');
	}
}
// ------------------------------------------------------------------------
/* End of file errors.php
 * Location: ./application/controllers/errors.php
 */