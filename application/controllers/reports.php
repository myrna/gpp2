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

     $tmpl = array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="dblist">' );
     $this->table->set_template($tmpl);
     
     $shrubs_status = $this->reports_model->get_shrubs_status();

     if ($shrubs_status['query']->num_rows() > 0)
     {
         $data = $this->build_shrubs_table($shrubs_status['query']->result_array(), "Sorted by Status");
         $this->template->set('thispage','Committee Reports');
         $this->template->set('title','Committee Reports | Great Plant Picks');
         $this->template->load('template','reports/shrubs', $data);
     }
 }
function shrubs_by_name() {
       // Enable Profiler.
     //$this->output->enable_profiler(TRUE);
     $this->load->model('reports_model');
     $this->load->library('table');

     $tmpl = array ('table_open' => '<table border="0" cellpadding="4" cellspacing="0" class="dblist">' );
     $this->table->set_template($tmpl);

     $shrubs_by_name = $this->reports_model->get_shrubs_by_name();

     if ($shrubs_by_name['query2']->num_rows() > 0) 
     {
         $data = $this->build_shrubs_table($shrubs_by_name['query2']->result_array(), "Sorted by Botanical Name");
         $this->template->set('thispage','Committee Reports');
         $this->template->set('title','Committee Reports | Great Plant Picks');
         $this->template->load('template','reports/shrubs', $data);
     }
}

function build_shrubs_table($results_array, $title) {
    $table = array();
    $table[] = array('Status','Plant Name','History','Nominated By');
    foreach ($results_array as $row)
    {
        $table[] = array(
            $row['status'],
            display_full_botanical_name($row),
            $row['gpp_history'],
            $row['nominator']);
    }
    $data['shrubs'] = $table;
    $data['heading'] = $title;
    return $data;
}

}
/* End of file nursery_list.php */
/* Location: ./application/controllers/nursery_list.php */