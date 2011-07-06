<?php

/**
 * listplants.php
 *
 * Show plant lists in sortable table, search for plants to display in table
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		
 */

class Listplants extends CI_Controller {

    function index($page = 0)
    {
	//	$this->output->enable_profiler(TRUE);
        
        $this->load->model('listplants_model');
        $records = $this->listplants_model->get_records($page);
        $total = $this->db->count_all_results('plant_data');
        $path = "listplants/index";
        $this->show_plants($page, $records, $total, $path);
    }
    
    function setup_search_query($terms) {
        $matchwords = explode(" ", $terms);
        $matchfields = array('genus', 'specific_epithet', 'family', 'cultivar', 'cross_species', 'trade_name');
        foreach ($matchfields as $field) {
            foreach ($matchwords as $match) {
                $this->db->or_like($field, $match);
            }
        }        
    }

    function search($page = 0) {
        if ($this->input->post('searchterms')) {
            $this->session->set_userdata('plant_search', $this->input->post('searchterms'));
        }
        
        $query = $this->session->userdata('plant_search');
        
        $this->load->model('listplants_model');
        $this->setup_search_query($this->session->userdata('plant_search'));
        $total = $this->db->count_all_results('plant_data');
        $this->setup_search_query($this->session->userdata('plant_search'));
        $records = $this->listplants_model->get_records($page);
        $path = "listplants/search";
        $this->show_plants($page, $records, $total, $path, $query);
    }
    
    function show_plants($page, $records, $total, $path, $query = '') {
         // Enable Profiler.
         // $this->output->enable_profiler(TRUE);
            $this->load->library('table');
            $this->load->helper('plant');
		
            $tmpl = array (
                    'table_open'          => '<table border="0" cellpadding="4" cellspacing="0" class="dblist">',
                    'heading_row_start'   => '<tr>',
                    'heading_row_end'     => '</tr>',
                    'heading_cell_start'  => '<th>',
                    'heading_cell_end'    => '</th>',
                    'row_alt_start'       => '<tr class="alternate">',                  
                    'table_close'         => '</table>'
              );

            $this->table->set_template($tmpl);

            if ($records->num_rows() > 0)
            {
                $table = array();
                $table[] = array(
                    'ID',
                    'Name',
                    'Edit/View',
                    'Images',
                    'Delete'
                );
                foreach ($records->result_array() as $row)
                {
                    $id = $row['id'];
                    $table[] = array(
                        $id,
                        display_full_botanical_name($row),
                        anchor('crud/edit_record/'.$id, 'Edit/View'),
                        anchor('gallery/upload_image/'.$id, 'Images'),
                        anchor('crud/delete_record/'.$id, 'Delete',
                        array('onclick' => 'return confirm(\'Are you sure you want to delete the record?\');')));
                }
                $data['records'] = $table;
            }
            $data['heading'] = "GPP Database Administration";
            $data['searchterms'] = $query;
            $data['total_rows'] = $total;
            $config = array();
            $config['base_url'] = site_url($path);
            $config['per_page'] = 30;
            $config['total_rows'] = $total;
            $config['uri_segment'] = 3;
            $this->pagination->initialize($config);

            $this->template->set('thispage','View Records');
            $this->template->set('title','View Records - Database Administration | Great Plant Picks');
            $this->template->load('template','listplants', $data);
    }

 }

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */
