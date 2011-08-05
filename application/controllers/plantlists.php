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
    
        function index() {

            $this->load->model('plantlists_model');

            $this->template->set('thispage','Plant Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('template','plantlists',$data);
        }

        function setup_basic_search($terms) {
            $matchwords = explode(" ", $terms);
            $matchfields = array('genus', 'specific_epithet', 'family', 'cultivar', 'cross_species', 'trade_name','trademark_name',
                'registered_name','plant_type'); // need to add common name and synonym
            foreach ($matchfields as $field) {
                foreach ($matchwords as $match) {
                    $this->db->or_like($field, $match);
                    }
                }
        }

        function basic_search($page = 0) {

            if ($this->input->post('searchterms')) {
                $this->session->set_userdata('plant_search', $this->input->post('searchterms'));
            }

            $query = $this->session->userdata('plant_search');

            $this->load->model('listplants_model');
            $this->setup_search_query($this->session->userdata('plant_search'));
            $total = $this->db->count_all_results('plant_data');
            $this->setup_search_query($this->session->userdata('plant_search'));
            $records = $this->listplants_model->get_records($page);
            $path = "listplants/display";
            $this->display($page, $records, $total, $path, $query);
             }

        function display($sort_by = 'name', $sort_order = 'asc', $offset = 0) {    // determines URL - display/sortby/sortorder/offset
         //  $this->output->enable_profiler(TRUE);
            $limit = 20;
            $data['fields'] = array(
              'display_full_botanical_name' => 'Plant Name',
              'plant_height_at_10' => 'Plant Height'
            );

            $this->input->load_query($query_id);

            $data['query_id'] = $query_id;

            $this->load->model('plantlists_model');

            $results = $this->plantlists_model->search($limit, $offset, $sort_by, $sort_order);
            $total = $this->db->count_all_results('plant_data');
            $plant_name_and_height = array();
            foreach ($results['rows'] as $result) {
                    $plant_name_and_height[] = array(
                    'name' => display_full_botanical_name($result),
                    'height' => $result['plant_height_at_10'] ? $result['plant_height_at_10'] : "-",
                    'id' => $result['id']
                );
            }
            $data['records'] = $plant_name_and_height;
            $data['num_results'] = $results['num_rows'];
    

            // pagination

            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("plantlists/display/$sort_by/$sort_order");
            $config['total_rows'] = $total;
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

        function get_plant_link_data($id) {  // copied from crud controller
            $data = array();
            $water = $this->crud_model->link_table($id, 'water', 'plant');
            $data['water']['fields'] = $water['list'];
            $data['water']['requirements'] = $water['current'];

            $sun = $this->crud_model->link_table($id, 'sun', 'plant');
            $data['sun']['fields'] = $sun['list'];
            $data['sun']['requirements'] = $sun['current'];

            $soil = $this->crud_model->link_table($id, 'soil', 'plant');
            $data['soil']['fields'] = $soil['list'];
            $data['soil']['requirements'] = $soil['current'];

            $wildlife = $this->crud_model->link_table($id, 'wildlife', 'plant');
            $data['wildlife']['fields'] = $wildlife['list'];
            $data['wildlife']['requirements'] = $wildlife['current'];

            $pest_resistance = $this->crud_model->link_table($id, 'pest_resistance', 'plant');
            $data['pest_resistance']['fields'] = $pest_resistance['list'];
            $data['pest_resistance']['requirements'] = $pest_resistance['current'];

            $flower_color = $this->crud_model->link_table($id, 'flower_color', 'plant');
            $data['flower_color']['fields'] = $flower_color['list'];
            $data['flower_color']['requirements'] = $flower_color['current'];

            $foliage_color = $this->crud_model->link_table($id, 'foliage_color', 'plant');
            $data['foliage_color']['fields'] = $foliage_color['list'];
            $data['foliage_color']['requirements'] = $foliage_color['current'];

            $foliage_texture = $this->crud_model->link_table($id, 'foliage_texture', 'plant');
            $data['foliage_texture']['fields'] = $foliage_texture['list'];
            $data['foliage_texture']['requirements'] = $foliage_texture['current'];

            $design_use = $this->crud_model->link_table($id, 'design_use', 'plant');
            $data['design_use']['fields'] = $design_use['list'];
            $data['design_use']['requirements'] = $design_use['current'];

            return $data;
    }

        function view($id = '') {
            //$this->output->enable_profiler(TRUE);
            $this->load->model('crud_model');
            $this->load->model('plantlists_model');
            $this->load->model('gallery_model');
            $this->load->helper('image');
            $this->load->helper('html');

            $data['title'] = "";

            $data['images'] = $this->gallery_model->get_images($id); //get image thumbnail(s) and display
            $data['synonyms'] = $this->crud_model->get_synonyms($id);
            $data['common_names'] = $this->crud_model->get_common_names($id);
            $data['plant_attributes'] = $this->get_plant_link_data($id);

            $row = $this->crud_model->get_record_as_array($id);
            $data['row'] = $row[0];
            $data['id'] = $data['row']['id'];

            

            $this->template->set('thispage','View Plant');
            $this->template->set('title','View Plant | Great Plant Picks');
            $this->template->load('template','plantlists/view', $data);
        }
            
           
}

/* End of file listplants.php */
/* Location: ./application/controllers/plants.php */
