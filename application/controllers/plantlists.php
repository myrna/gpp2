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
    

     //  var $plantname = display_full_botanical_name;
        
        function display($sort_by = 'genus', $sort_order = 'asc', $offset = 0) {    // determines URL - display/sortby/sortorder/offset
           //$this->output->enable_profiler(TRUE);
            $limit = 20;
            $data['fields'] = array(
              'full_botanical_name' => 'Plant Name',
              'plant_height_at_10' => 'Plant Height'
            );

            $this->load->model('plantlists_model');

            $results = $this->plantlists_model->search($limit, $offset, $sort_by, $sort_order);
            $plant_name_and_height = array();
            foreach ($results['rows'] as $result) {
                $plant_name_and_height[display_full_botanical_name($result)] = $result['plant_height_at_10'] ? $result['plant_height_at_10'] : "-";
            }
            $data['records'] = $plant_name_and_height;
            $data['num_results'] = $results['num_rows'];

            // pagination

            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("plantlists/display/$sort_by/$sort_order");
            $config['total_rows'] = $data['num_results'];
            $config['per_page'] = $limit;
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();

            $data['sort_by'] = $sort_by;
            $data['sort_order'] = $sort_order;

            $this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('template','plantlists/display',$data);
            
        }

        function view($id = '')
        {
            $this->output->enable_profiler(TRUE);
            $this->load->model('crud_model');
            $this->load->model('gallery_model');
            $this->load->helper('image');
            $this->load->helper('html');

            $data['images'] = $this->gallery_model->get_images($id); //get image thumbnail(s) and display
            $data['synonyms'] = $this->crud_model->get_synonyms($id);
            $data['common_names'] = $this->crud_model->get_common_names($id);
          
            $row = $this->crud_model->get_record($id);
            $data['row'] = $row[0];
            $data['id'] = $data['row']['id'];
            $this->template->set('thispage','View Plant');
            $this->template->set('title','View Plant | Great Plant Picks');
            $this->template->load('template','plantlists/view', $data);
        }
}

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */
