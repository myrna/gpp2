<?php

/**
 * plantlists.php
 *PUBLIC
 * Show plant lists in sortable table, search for plants to display in table
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		
 */

class Plantlists extends CI_Controller {

   function display($query_id = 0, $offset = 0, $sort_by = 'genus', $sort_order) {
                $this->output->enable_profiler(TRUE);
                
                $limit = 20;
		$data['fields'] = array(
			'genus' => 'Plant Name',
			'plant_height_at_10' => 'Plant Height at 10 Years'
		);

                $this->input->load_query($query_id);

                $query_array = array(
			'genus' => $this->input->get('genus'),
			'height_comparison' => $this->input->get('height_comparison'),
			'plant_height_at_10' => $this->input->get('plant_height_at_10'),
		);

                $data['query_id'] = $query_id;

		$this->load->model('plantlists_model');

		$results = $this->plantlists_model->search($query_array, $limit, $offset, $sort_by, $sort_order);

                $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
		$sort_columns = array('genus', 'plant_height_at_10');
		$sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'genus';

		$data['plants'] = $results['rows'];
		$data['num_results'] = $results['num_rows'];

		// pagination
		$this->load->library('pagination');
		$config = array();
		$config['base_url'] = site_url("plantlists/display/$query_id/$sort_by/$sort_order");
		$config['total_rows'] = $data['num_results'];
		$config['per_page'] = $limit;
		$config['uri_segment'] = 6;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();

		$data['sort_by'] = $sort_by;
		$data['sort_order'] = $sort_order;

                $data['category_options'] = $this->plantlists_model->category_options();

            $this->template->set('thispage','View Records');
            $this->template->set('title','Search Plants | Great Plant Picks');
            $this->template->load('template','plantlists/view', $data);
    }

 }

 function search()
 {
     $query_array = array(
         'genus' => $this->input->post('title'),
         'plant_height_at_10' => $this->input->post('plant_height_at_10'),
         'height_comparison' => $this->input->post('height_comparison')
         );

     $query_id = $this->input->save_query($query_array);
     redirect("plantlists/display/$query_id");
 }

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */
