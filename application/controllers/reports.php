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

class Reports extends CI_Controller
{
 function committee_reports()
 {
     parent::Controller();
 }
 
 function shrubs_status()
 {
        // Enable Profiler.
     //$this->output->enable_profiler(TRUE);
     $this->load->model('reports_model');
     $this->load->library('table');
     $shrubs_status = $this->reports_model->get_shrubs_status();

     if ($shrubs_status['query']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Status','Genus','History','Nominated By');

         foreach ($shrubs_status['query']->result() as $row)
         {
              $table[] = array($row->status,$row->genus,$row->gpp_history,$row->nominator);

         }
         $data['shrubs_status'] = $table;
         $data['heading'] = 'Sorted by Status';
         }
      
        $this->template->set('thispage','Committee Reports');
        $this->template->set('title','Committee Reports | Great Plant Picks');
        $this->template->load('template','reports/shrubs_status', $data);
    
 }
function shrubs_by_name() {
       // Enable Profiler.
     //$this->output->enable_profiler(TRUE);
     $this->load->model('reports_model');
     $this->load->library('table');
     $shrubs_by_name = $this->reports_model->get_shrubs_by_name();

     if ($shrubs_by_name['query2']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Genus','Status','History','Nominated By');

         foreach ($shrubs_by_name['query2']->result() as $row)
         {
              $table[] = array($row->genus,$row->status,$row->gpp_history,$row->nominator);

         }
        $data['shrubs_by_name'] = $table;
        $data['heading'] = 'Sorted by Botanical Name';
         
        $this->template->set('thispage','Committee Reports');
        $this->template->set('title','Committee Reports | Great Plant Picks');
        $this->template->load('template','reports/shrubs_by_name', $data);
        }
}
}
/* End of file nursery_list.php */
/* Location: ./application/controllers/nursery_list.php */