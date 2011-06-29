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

class Nursery_list extends CI_Controller
{
 function display_nurseries()
 {
     parent::Controller();
 }
 function index()
 {
        // Enable Profiler.
    //$this->output->enable_profiler(TRUE);
     $this->load->library('table');
     $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="4" cellspacing="0" class="nursery">',
                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',
                    'row_alt_start'       => '<tr class="alternate">',
                    'table_close'         => '</table>'
              );

            $this->table->set_template($tmpl);
     $this->load->model('nurserylist_model');
     $nurseries_wa = $this->nurserylist_model->get_nurseries_wa();
     $nurseries_or = $this->nurserylist_model->get_nurseries_or();
     $nurseries_bc = $this->nurserylist_model->get_nurseries_bc();
     $nurseries_other = $this->nurserylist_model->get_nurseries_other();
        
     if ($nurseries_wa['query']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Nursery Name','Location','Phone','Website');
         
         foreach ($nurseries_wa['query']->result() as $row)
         {
              $table[] = array($row->nursery_name,$row->location,$row->phone,
             auto_link($row->website_url));
             
         }
         $data['nurseries_wa'] = $table;
         $data['heading'] = 'Nursery Directory';
     }
     if ($nurseries_or['query2']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Nursery Name','Location','Phone','Website');

         foreach ($nurseries_or['query2']->result() as $row)
         {
              $table[] = array($row->nursery_name,$row->location,$row->phone,
             auto_link($row->website_url));

         }
         $data['nurseries_or'] = $table;
         
     }
     if ($nurseries_bc['query3']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Nursery Name','Location','Phone','Website');

         foreach ($nurseries_bc['query3']->result() as $row)
         {
              $table[] = array($row->nursery_name,$row->location,$row->phone,
             auto_link($row->website_url));

         }
         $data['nurseries_bc'] = $table;

     }
     if ($nurseries_other['query4']->num_rows() > 0)
     {
         $table = array();
         $table[] = array('Nursery Name','Location','Phone','Website');

         foreach ($nurseries_other['query4']->result() as $row)
         {
              $table[] = array($row->nursery_name,$row->location,$row->phone,
             auto_link($row->website_url));

         }
         $data['nurseries_other'] = $table;

     }

        $this->template->set('thispage','Nursery Directory');
        $this->template->set('title','Nursery Directory | Great Plant Picks');
        $this->template->load('template','nursery_list', $data);
    
 }
}


/* End of file nursery_list.php */
/* Location: ./application/controllers/nursery_list.php */