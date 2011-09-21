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
            $this->template->set('thispage','Find Your Plant');
            $this->template->set('title','View Plant | Great Plant Picks');
            $this->template->load('template','plantlists/search');

        }

        function advanced() {
            $this->template->set('thispage','Advanced Search');
            $this->template->set('title','Advanced Search | Great Plant Picks');
            $this->template->load('template','plantlists/advanced_search', $data);
        }

        function index() {
            if ($this->input->post('searchterms')) {
                $query = $this->input->post('searchterms');
	            $query_id = $this->input->save_query($query);
				redirect("/plantlists/saved_searches/" . $query_id);
            } else {
				$this->search();
            }
               
        }

        function get_plant_link_data($id) {
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

        // single plant fact sheet view controller

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
        
		function by_year() {
			$year = $this->uri->segment(3);
			$this->process_advanced_search(array('gpp_year' => $year));
		}
		
		function by_plant_type() {
			$types = explode("|", urldecode($this->uri->segment(3)));
			$this->process_advanced_search(array('plant_type' => $types));
		}
		
		function by_texture() {
			$texture = $this->uri->segment(3);
			$this->process_advanced_search(array('foliage_texture' => $texture));
		}
		
		function plant_array($results) {
			$a = array();
			foreach ($results['rows'] as $result) {
                  $a[] = array(
                  'name' => display_full_botanical_name($result),
                  'common' => $result['family_common_name'],
                  'height' => $result['plant_height_at_10'],
                  'id' => $result['id']
              );
            }
			return $a;
		}

		function search_stats($results, $query) {
			$total_count = $this->db->select('COUNT(DISTINCT plant_data.id) as numrows')->from("(select * from plant_data where publish = 'Yes') as plant_data")->get()->result_array();
            $total = $total_count[0]['numrows'];
            if (isset($query)) {
				if ($query != "") {
					if ($results['found'] == 0) {
						// put a message about the search not finding anything
					}
          			$stats = $results['found'] . " of " . $total;					 
            	} else {
                	$stats = $total;
            	}
			} else {
      			$stats = $results['found'] . " of " . $total;					 
			}
			
			return $stats;
		}

        function advanced_search() {
       		$query_array = array(  
                'plant_type' => $this->input->post('plant_type'),        
                'foliage_type'  => $this->input->post('foliage_type'),
                'gpp_year' => $this->input->post('gpp_year'),
                'theme' => $this->input->post('theme'),
                'plant_height_max' => $this->input->post('plant_height_max'),
				'plant_height_min' => $this->input->post('plant_height_min'),
                'growth_habit' => $this->input->post('growth_habit'),   
                'flower_time' => $this->input->post('flower_time'),
                'flower_color' => $this->input->post('flower_color'),
                'foliage_color' => $this->input->post('foliage_color'), 
                'sun' => $this->input->post('sun'),
                'soil' => $this->input->post('soil'),
                'water' => $this->input->post('water')
                 );

            $query_id = $this->input->save_query($query_array);
			redirect("/plantlists/saved_searches/" . $query_id);
        }

		function process_basic_search($query) {
			$this->load->model('plantlists_model');
            $results = $this->plantlists_model->basic_search($query);
            
			if (isset($query) and $query != "" and $results['found'] == 0) {
				$this->session->set_flashdata('message', 'Sorry, no plants meet your criteria.  Please try again.');
			    redirect(site_url("plantlists/"), "refresh");
			} else {
	           	$data['records'] = $this->plant_array($results);
				$data['stats'] = $this->search_stats($results, $query);
				$this->display_results($data);
			}
		}

		function process_advanced_search($query) {
			//$this->output->enable_profiler(true);
            $this->load->model('crud_model');
            $this->load->model('plantlists_model');

            $results = $this->plantlists_model->advanced_search($query);
            if ($results['found'] == 0) {
			    $this->session->set_flashdata('message', 'Sorry, no plants meet your criteria.  Please try again.');
                redirect(site_url('plantlists/advanced'), 'refresh');
			} else {
	            $data['records'] = $this->plant_array($results);
	            $data['stats'] = $this->search_stats($results);
				$this->display_results($data);
            }	
		}

		function display_results($data) {
			$this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('template','plantlists/results',$data);
		}
		
		function saved_searches() {
			$id = $this->uri->segment(3);
			$query = $this->input->load_query($id);
			if (isset($query)) {
				if (is_string($query)) {
					$this->process_basic_search($query);
				} elseif (is_array($query)) {
					$this->process_advanced_search($query);
				}
			} else {
				echo "Could not find a saved search numbered " . $id;
			}
		}
           
}

/* End of file plantlists.php */
/* Location: ./application/controllers/plantlists.php */
