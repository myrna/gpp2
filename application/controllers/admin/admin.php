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

	        
	function index()
	{
          if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('admin'))
		{
                        $this->session->set_flashdata('message', 'You Must Be Logged In To View This Page');
			redirect('auth/login');
		}
          
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );
  		
                 $this->template->set('thispage','Database Administration');
                 $this->template->set('title','Database Administration | Great Plant Picks');
                 $this->template->load('admin/admin_template','admin/admin',$data);
           }
      }
         
}

/* End of file admin.php */
/* Location: ./application/controllers/admin/admin.php */