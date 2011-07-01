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
 function index()
 {
        // Enable Profiler.
    $this->output->enable_profiler(TRUE);
   
    $this->load->model('reports_model');
    $shrubs_vines = $this->nurserylist_model->get_shrubs_report();
   
   //$trees_conifers = $this->reports_model->get_trees_report();
   //$perennials_bulbs = $this->reports_model->get_perennials_report();

   
    
        $this->template->set('thispage','Committee Reports');
        $this->template->set('title','Committee Reports | Great Plant Picks');
        $this->template->load('template','reports/shrubs_vines', $data);
    
 }
}
/* End of file nursery_list.php */
/* Location: ./application/controllers/nursery_list.php */