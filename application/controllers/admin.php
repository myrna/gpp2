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

        
	function index()
	{
          //  if (!$this->ion_auth->logged_in())
	//	{
	//		redirect('auth/login');
	//	}
         //  else {
          //     $data = array(
          //      'logged_in' => $this->ion_auth->logged_in()
          //      );
  		
                 $this->template->set('thispage','Database Administration');
                 $this->template->set('title','Database Administration | Great Plant Picks');
                 $this->template->load('admin_template','admin',$data);
          // }
        }
         
}

/* End of file some.php */
/* Location: ./application/controllers/some.php */