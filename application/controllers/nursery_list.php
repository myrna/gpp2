<?php

/**
 * GPP
 *
 * @package		GPP
 * @author		mlo
 * @copyright		Copyright (c) 2011
  * @since			Version 1.0
 */

// ------------------------------------------------------------------------

/**
 * Nursery List Controller
 *
 * Controls view of nursery listings
 *
 */

class Nursery_list extends Controller
{
 function display_nurseries()
 {
     parent::Controller();
 }
 function index()
 {
        // Enable Profiler.
    $this->output->enable_profiler(TRUE);
     $this->load->library('table');
     $this->load->model('nurserylist_model');
     $nurseries = $this->nurserylist_model->get_nurseries();
        
     if ($nurseries['query']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Nursery Name','Location','Phone','Website');
        
         foreach ($nurseries['query']->result() as $row)
         {
              $table[] = array($row->nursery_name,$row->location,$row->phone,
             auto_link($row->website_url));
             
         }
         $data['nurseries'] = $table;
         $data['heading'] = 'Nursery Directory';
     }
    
     $this->load->view('nursery_list', $data);
 }
}


/* End of file some.php */
/* Location: ./application/controllers/some.php */