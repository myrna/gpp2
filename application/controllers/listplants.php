<?php

/**
 * listplants.php
 *
 * Show plant lists in sortable table, search for plants to display in table
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		mlo
 */

class Listplants extends Controller {
    function display($query_id = 0, $sort_by = 'family', $sort_order = 'asc', $offset = 0)
         {
               $limit = 20; // number of items to show per page

         $plants['fields'] = array(   // fields to show in table
            'PlantID' => 'Plant ID',
            'family' => 'Family',
            'genus' => 'Genus',
            'species' => 'Species',
            'cultivar' => 'Cultivar',
             'PlantType' => 'PlantType',
            'PlantHeight' => 'Plant Height'
        );

        $this->input->load_query($query_id);   // searchable fields

        $query_array = array(
            'family' => $this->input->get('family'),
            'genus' => $this->input->get('genus'),
            'species' => $this->input->get('species'),
            'cultivar' => $this->input->get('cultivar'),
            'PlantType' => $this->input->get('PlantType'),
            'height_comparison' => $this->input->get('height_comparison'),
            'PlantHeight' => $this->input->get('PlantHeight'),
        );

        //print_r($query_array); return;   // test query if bug

        $plants['query_id'] = $query_id;

        $this->load->model('listplants_model');

        $results = $this->listplants_model->search($query_array, $limit, $offset, $sort_by, $sort_order);
        $plants['plants'] = $results['rows'];
        $plants['num_results'] = $results['num_rows'];  // show number of query results

        // pagination
        $this->load->library('pagination');    // establish url sequence and allow pagination
        $config = array();
        $config['base_url'] = site_url("listplants/display/$query_id/$sort_by/$sort_order");
        $config['total_rows'] = $plants['num_results'];
        $config['per_page'] = $limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $plants['pagination'] = $this->pagination->create_links();
// test this when we have more records!
        $plants['sort_by'] = $sort_by;
	$plants['sort_order'] = $sort_order;

// choose plant based on type
        $plants['planttype_options'] = $this->listplants_model->planttype_options();  // load dropdown options

        $this->load->view('list_plants', $plants);
    }

    function search() {   // searchable fields
         
        $query_array = array(
            'family' => $this->input->post('family'),
            'genus' => $this->input->post('genus'),
            'species' => $this->input->post('species'),
            'cultivar' => $this->input->post('cultivar'),
            'PlantType' => $this->input->post('PlantType'),
            'height_comparison' => $this->input->post('height_comparison'),
            'PlantHeight' => $this->input->post('PlantHeight'),
        );

        $query_id = $this->input->save_query($query_array);

        redirect("listplants/display/$query_id");   // query URL
       
    }
 }

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */