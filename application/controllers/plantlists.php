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

        //working on search page (eventual index page?) that will list popular searches and link to advanced search

        function search() {
            $this->template->set('thispage','View Plant');
            $this->template->set('title','View Plant | Great Plant Picks');
            $this->template->load('template','plantlists/search');

        }

        // search results, or list all results (clear search)

        function index($sort_by = 'genus', $sort_order = 'asc', $offset = 0) {

            // $this->output->enable_profiler(TRUE);
            $this->load->model('plantlists_model');
           // $limit = 20;

            if ($this->input->post('searchterms')) {
                $query = $this->input->post('searchterms');
            } else {
                $query = "";
            }
            
            //define sortable fields
            $data['sortfields'] = array(
              'genus' => 'Plant Name',
              'family_common_name' => 'Family (Common)',
              'plant_height_at_10' => 'Height'
            );

            if ($this->input->post('searchterms')) {
                $query = $this->input->post('searchterms');
            } else {
                $query = "";
            }
            $results = $this->plantlists_model->basic_search($query, $limit, $offset, $sort_by, $sort_order);
            $total_count = $this->db->select('COUNT(DISTINCT plant_data.id) as numrows')->from("(select * from plant_data where publish = 'Yes') as plant_data")->get()->result_array();
            $total = $total_count[0]['numrows'];
            $plant_name_and_height = array();
            foreach ($results['rows'] as $result) {
                  $plant_name_and_height[] = array(
                  'name' => display_full_botanical_name($result),
                  'common' => $result['family_common_name'],
                  'height' => $result['plant_height_at_10'],// ? $result['plant_height_at_10'] : "-",
                  'id' => $result['id']
              );
            }
            $data['records'] = $plant_name_and_height;
            if ($query != "") {
                $data['stats'] = $results['found'] . " of " . $total;
            } else {
                $data['stats'] = $total;
            }

            // pagination

            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("plantlists/$query/$sort_by/$sort_order");
            $config['total_rows'] = $results['found'];
            $config['per_page'] = $limit;
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();

            $data['sort_by'] = $sort_by;
            $data['sort_order'] = $sort_order;
            
            $this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('template','plantlists/home',$data);
                  
        }

        function get_plant_link_data($id) {  // copied from crud controller
            $data = array();
            $water = $this->crud_model->link_table($id, 'water', 'plant', true);
            $data['water'] = $water['values'];

            $sun = $this->crud_model->link_table($id, 'sun', 'plant');
            $data['sun'] = $sun['values'];

            $soil = $this->crud_model->link_table($id, 'soil', 'plant');
            $data['soil'] = $soil['values'];

            $wildlife = $this->crud_model->link_table($id, 'wildlife', 'plant');
            $data['wildlife'] = $wildlife['values'];

            $pest_resistance = $this->crud_model->link_table($id, 'pest_resistance', 'plant');
            $data['pest_resistance'] = $pest_resistance['values'];

            $flower_color = $this->crud_model->link_table($id, 'flower_color', 'plant');
            $data['flower_color'] = $flower_color['values'];

            $foliage_color = $this->crud_model->link_table($id, 'foliage_color', 'plant');
            $data['foliage_color'] = $foliage_color['values'];

            $foliage_texture = $this->crud_model->link_table($id, 'foliage_texture', 'plant');
            $data['foliage_texture'] = $foliage_texture['values'];

            $design_use = $this->crud_model->link_table($id, 'design_use', 'plant');
            $data['design_use'] = $design_use['values'];

            return $data;
    }

        function view($id) {
           // $this->output->enable_profiler(TRUE);
            $this->load->model('crud_model');
            $this->load->model('plantlists_model');
            $this->load->model('gallery_model');
            $this->load->helper('image');
            $this->load->helper('html');
            $this->load->helper('conversion');

            $data['title'] = "";

            $data['images'] = $this->gallery_model->get_images($id); //get image thumbnail(s) and display
            //  ------- PRIMARY IMAGE ------
            # find the primary image for this plant, set it to primary, and yank it from the list.
            foreach ($data['images'] as $image) {
                if (in_array('primary', $image['categories'])) {
                    $data['primary_image'] = $image;
                    //unset($data['images'], $image);
                }
            }
            foreach ($data['images'] as $image) {
                if (in_array('detail', $image['categories'])) {
                    $data['detail_image'] = $image;
                    //unset($data['images'], $image);
                }
            }
            foreach ($data['images'] as $image) {
                if (in_array('landscape', $image['categories'])) {
                    $data['landscape_image'] = $image;
                    //unset($data['images'], $image);
                }
            }

            $data['synonyms'] = $this->crud_model->get_synonyms($id);
            $data['common_names'] = $this->crud_model->get_common_names($id);
            $data['plant_attributes'] = $this->get_plant_link_data($id);
            $data['details'] = $this->crud_model->get_record($id);
            
            $row = $this->crud_model->get_record_as_array($id);
            $data['row'] = $row[0];
            $data['id'] = $data['row']['id'];

            $this->template->set('thispage','View Plant');
            $this->template->set('title','View Plant | Great Plant Picks');
            $this->template->load('template','plantlists/view', $data);
        }

  // need to create previous and next links for individual plant views; need to use previous/next rows in found set...?
        //codeigniter has previous_row(), next_row() query result functions....

        function get_previous($id) {
            $query = $this->view($row);
            $row = $query->previous_row();
            $data = $row;
            
            $this->template->set('thispage','View Plant');
            $this->template->set('title','View Plant | Great Plant Picks');
            $this->template->load('template','plantlists/view', $data);
        }
        
        function advanced() {
         
            
            $this->template->set('thispage','Advanced Search');
            $this->template->set('title','Advanced Search | Great Plant Picks');
            $this->template->load('template','plantlists/advanced_search', $data);
        }
        

        function advancedsearch($query_id = 0, $sort_by = 'genus', $sort_order = 'asc', $offset = 0) {
         //   $this->output->enable_profiler(TRUE);
        //    $this->input->load_query($query_id);  CAUSES ERROR on live site does not recognize load_query

            $query_array = array(  
                'plant_type' => $this->input->post('plant_type'),        
                'foliage_type'  => $this->input->post('foliage_type'),
                'gpp_year' => $this->input->post('gpp_year'),
                'theme' => $this->input->post('theme'),
                'plant_height_max' => $this->input->post('plant_height_max'),  
                'height_comparison' => $this->input->post('height_comparison'), //see note in plantlists_model at end
                'growth_habit' => $this->input->post('growth_habit'),   
                'flower_time' => $this->input->post('flower_time'),
                'flower_color' => $this->input->post('flower_color'),
                'foliage_color' => $this->input->post('foliage_color'), 
                'sun' => $this->input->post('sun'),
                'soil' => $this->input->post('soil'),
                'water' => $this->input->post('water')
                 );

                      
       //     $data['query_id'] = $query_id;

            $this->load->model('crud_model');
            $this->load->model('plantlists_model');
            //var_dump($query_array);
            $results = $this->plantlists_model->advanced_search($query_array,
                    $limit, $offset, $sort_by, $sort_order);

	    $data['num_results'] = count($results);
            //somehow this ends up with search results on the /plantlists page ...?
            //or do we need a new search results page to accommodate query_id?
            //this is the sort of URL the nettuts tutorial ends up with: $config['base_url'] =
            //site_url("plantlists/search/$query_id/$sort_by/$sort_order") -- not so important to keep the sortby/sortorder business,
            //this probably wouldn't work anyway because of the jquery tablesorter; just need a way to id query results
            $plant_name_and_height = array();
            foreach ($results as $result) {
                  $plant_name_and_height[] = array(
                  'name' => display_full_botanical_name($result),
                  'common' => $result['family_common_name'],
                  'height' => $result['plant_height_at_10'],
                  'id' => $result['id']
              );
            }
            $data['records'] = $plant_name_and_height;
            $data['stats'] = count($results);

            $config['base_url'] = site_url("plantlists/results/$query_id");

            $this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('template','plantlists/results',$data);

        }
           
}

/* End of file plantlists.php */
/* Location: ./application/controllers/plantlists.php */
