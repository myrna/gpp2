<?php

/**
 * plantlists.php
 *PUBLIC
 * Show search results and plant 
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		
 */

class Plantlists extends CI_Controller {

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

    function plant_not_listed() {
        $this->template->set('thispage','No Plant');
        $this->template->set('title','Why Can\'t I Find My Plant | Great Plant Picks');
        $this->template->load('template','plantlists/plant_not_listed');
    }

    function autocomplete_set() {
        $this->load->model('plantlists_model');
        $name_parts = $this->plantlists_model->botanical_name_parts();
        $botanical_sql_frag = $this->plantlists_model->autocomplete_consolidate_botanical_name($name_parts);
        // this should probably be a closure for DRY.
        function flatten_common_names($record) {
            return $record['common_name'];
        }
            
        function flatten_botanical_names($record) {
            $str = preg_replace("/\s\s+/", " ", $record['botanical_name']);
            return trim($str);
        }
            
        function flatten_botanical_parts($records, $name_parts) {
            $matchfields = $name_parts;
            $a = array();
            foreach ($records as $record) {
                foreach ($matchfields as $field) {
                    if ($record[$field] != NULL) {
                        $a[] = $record[$field];
                    }
                }
            }
            return array_unique($a);
        }
            
        function botanical_parts($name_parts) {
            $a = array();
            foreach ($name_parts as $field){
                $a[] = "trim(lower($field)) as $field";
            }
            return join($a, ", ");
        }
            
        $botanical_query = $this->db->query("select * from " . $botanical_sql_frag . " as plant_data order by botanical_name");
        $botanical_data = $botanical_query->result_array();
        $botanical_names = array_map("flatten_botanical_names", $botanical_data);
            
        $this->db->select('lower(trim(plant_common_name.common_name)) as common_name')->from('plant_common_name')->distinct()->order_by('common_name');
        $common_name_data = $this->db->get()->result_array();
        $common_names = array_map("flatten_common_names", $common_name_data);
            
        $this->db->select(botanical_parts($name_parts))->from('plant_data');
        $botanical_parts_data = $this->db->get()->result_array();
        $botanical_parts = flatten_botanical_parts($botanical_parts_data, $name_parts);
        $test = array();
        $data = array_merge($common_names, $botanical_names, $botanical_parts, $test);
        sort($data);
        // $this->output->enable_profiler(TRUE);
        // $this->output->set_output("hey");
        $this->output->set_content_type('application/json');
        $this->output->set_output(json_encode($data));
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

            $theme = $this->crud_model->link_table($id, 'theme', 'plant');
            $data['theme'] = $theme['values'];

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

        function print_view($id) {
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
                    unset($data['images'], $image);
                }
            }
            
            $data['synonyms'] = $this->crud_model->get_synonyms($id);
            $data['common_names'] = $this->crud_model->get_common_names($id);
            $data['plant_attributes'] = $this->get_plant_link_data($id);
            $data['details'] = $this->crud_model->get_record($id);

            $row = $this->crud_model->get_record_as_array($id);
            $data['row'] = $row[0];
            $data['id'] = $data['row']['id'];

            $this->template->set('thispage','Print View');
            $this->template->set('title','Print View | Great Plant Picks');
            $this->template->load('print_template','plantlists/print_view', $data);
        }
  // preconfigured searches --------------------------------------- //

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

         function by_theme() {
                $theme = $this->uri->segment(3);
                $this->process_advanced_search(array('theme' => $theme));
        }

        function by_genus() {
                $genus = $this->uri->segment(3);
                $this->process_advanced_search(array('genus' => $genus));
        }

         function by_design_use() {
                $design_use = $this->uri->segment(3);
                $this->process_advanced_search(array('design_use' => $design_use));
        }

         function by_pest_resistance() {
            $pest_resistance = $this->uri->segment(3);
            $this->process_advanced_search(array('pest_resistance' => $pest_resistance));
        }

        function by_publish() {
            $publish = $this->uri->segment(3);
            $this->process_advanced_search(array('publish' => $publish));
        }

        function by_common_name() {
                $common_name = $this->uri->segment(3);
                $this->process_advanced_search(array('common_name' => $common_name));
        }
        function evergreen_azalea() {
                $common_name = $this->uri->segment(3);
                $common_name = "evergreen azalea";
                $this->process_advanced_search(array('common_name' => $common_name));
        }
        function small_tree() {
                $small_tree = $this->uri->segment(3);
                $small_tree = $this->process_advanced_search(array(
                  'plant_type' => "tree",
                  'plant_height_at_10' => "20"
                ));
        }
        function made_in_the_shade() {
                $type = $this->uri->segment(3);
                $type = $this->process_advanced_search(array(
                  'theme' => "shade",
                  'plant_type' => $type
                ));
        }
        function shade_type() {
                $type = $this->uri->segment(3);
                $type = $this->process_advanced_search(array(
                  'theme' => "shade",
                  'sun' => $type
                ));
        }
      
        function dry_shade() {
                $dry_shade = $this->uri->segment(3);
                $dry_shade = $this->process_advanced_search(array(
                  'theme' => "shade",
                  'water' => "drought-tolerant"
                ));
        }

        function fun_in_the_sun() {
                $type = $this->uri->segment(3);
                $type = $this->process_advanced_search(array(
                  'theme' => "sun_drought",
                  'plant_type' => $type
                ));
        }

        function fantastic_foliage() {
                $type = $this->uri->segment(3);
                $type = $this->process_advanced_search(array(
                  'theme' => "foliage",
                  'foliage_texture' => $type
                ));
        }
         function fantastic_foliage_color() {
                $type = $this->uri->segment(3);
                $type = $this->process_advanced_search(array(
                  'theme' => "foliage",
                  'foliage_color' => $type
                ));
        }

       function plant_array($results) { /* format plant results page ------- */
          $a = array();
          foreach ($results['rows'] as $result) {
          $a[] = array(
          'name' => display_full_botanical_name($result),
          'common_family_name' => $result['family_common_name'],
          'common_names' => join($result['common_names'], ", "),
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
            //$this->output->enable_profiler(TRUE);
       		$query_array = array(  
                'plant_type' => $this->input->get_post('plant_type'),        
                'foliage_type'  => $this->input->get_post('foliage_type'),
                'gpp_year' => $this->input->get_post('gpp_year'),
                'theme' => $this->input->get_post('theme'),
                'plant_height_at_10' => $this->input->get_post('plant_height_at_10'),
				'plant_height_min' => $this->input->get_post('plant_height_min'),
                'plant_width_at_10' => $this->input->get_post('plant_width_at_10'),
				'plant_width_min' => $this->input->get_post('plant_width_min'),
                'zone_low' => $this->input->get_post('zone_low'),
				'zone_low_max' => $this->input->get_post('zone_low_max'),
                'growth_habit' => $this->input->get_post('growth_habit'),
                'flower_time' => $this->input->get_post('flower_time'),
                'flower_color' => $this->input->get_post('flower_color'),
                'foliage_color' => $this->input->get_post('foliage_color'), 
                'sun' => $this->input->get_post('sun'),
                'soil' => $this->input->get_post('soil'),
                'water' => $this->input->get_post('water'),
                'genus' => $this->input->get_post('genus'),
                'design_use' => $this->input->get_post('design_use'),
                'pest_resistance' => $this->input->get_post('pest_resistance'),
                'theme' => $this->input->get_post('theme'),
                'common_name' => $this->input->get_post('common_name')
                 );
            $query_id = $this->input->save_query($query_array);
            
			redirect("/plantlists/saved_searches/" . $query_id);
        }

    function process_basic_search($query) {
        //$this->output->enable_profiler(TRUE);
        $this->load->model('plantlists_model');
        $results = $this->plantlists_model->basic_search($query);

        if ($query == "Enter botanical or common name") {
            $this->session->set_flashdata('message', '<p class="flash">Sorry, no search term was entered.  Please enter a search term.</p>');
            redirect(site_url("plantlists/search"), "refresh");
        } elseif (isset($query) and $query != "" and count($results['rows']) == 0) {
            $this->session->set_flashdata('message', '<p class="flash">Sorry, no plants meet your criteria.  Please try again.<br /><a href="plantlists/plant_not_listed/">Why isn\'t my plant listed?</a></p>');
            redirect(site_url("plantlists/search"), "refresh");
        } elseif (isset($query) and $query == "") {
            $this->session->set_flashdata('message', '<p class="flash">Sorry, no plants meet your criteria.  Please try again.<br /><a href="plantlists/plant_not_listed/">Why isn\'t my plant listed?</a></p>');
            redirect(site_url("plantlists/search"), "refresh");
        } else {
            $data['records'] = $this->plant_array($results);
            $data['stats'] = $this->search_stats($results, $query);
            $this->display_results($data);
        }
    }

	function process_advanced_search($query) {
            $this->load->model('crud_model');
            $this->load->model('plantlists_model');

            $results = $this->plantlists_model->advanced_search($query);
            if ($results['found'] == 0) {
			    $this->session->set_flashdata('message', '<p class="flash">Sorry, no plants meet your criteria.  Please try again.<br />
                                    <a href="plantlists/plant_not_listed/">Why isn\'t my plant listed?</a></p>');
                redirect(site_url("plantlists/advanced"), "refresh");  // this routing is not being used, defaulting to basic search routing
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
