<?php

/**
 * admin_search.php
 *PRIVATE
 * Show administrative query results
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		
 */

class Admin_search extends CI_Controller {

       function index() {
           //you must be logged in to view this page
           if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('admin'))
		{
                        $this->session->set_flashdata('message', 'You Must Be Logged In To View This Page');
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );
          }
          
            $heading = 'Administrative Search and Queries';

            $this->template->set('thispage','Advanced Search');
            $this->template->set('title','Advanced Search | Great Plant Picks');
            $this->template->load('admin/admin_template','admin/admin_search', $data);
        }

       function admin_queries($sort_by = 'genus', $sort_order = 'asc', $offset = 0) {
            $this->load->model('plantlists_model');
            // $this->output->enable_profiler(TRUE);
            $query = "";

            $results = $this->plantlists_model->admin_query($query, $limit, $offset, $sort_by, $sort_order);
            $total_count = $this->db->select('COUNT(DISTINCT plant_data.id) as numrows')->from("(select * from plant_data) as plant_data")->get()->result_array();
            $total = $total_count[0]['numrows'];
            $plant_name_and_height = array();
            foreach ($results['rows'] as $result) {
                  $query_results[] = array(
                  'name' => display_full_botanical_name($result),
                  'common' => $result['family_common_name'],
                  'status' => $result['status'],
                  'year' => $result['gpp_year'],
                  'committee' => $result['committee'],
                  'id' => $result['id']
              );
            }
            $data['records'] = $query_results;

            if ($query != "") {
                $data['stats'] = $results['found'] . " of " . $total;

            } else {
                $data['stats'] = $total;

            }
             $this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('admin/admin_template','admin/query_results',$data);
       }
       function get_plant_link_data($id) {
            $this->load->model('crud_model');

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

  
   

        function admin_query($query_id = 0, $sort_by = 'genus', $sort_order = 'asc', $offset = 0) {
            //you must be logged in to view this page
           if (!$this->ion_auth->logged_in() || !$this->ion_auth->is_group('admin'))
		{
                        $this->session->set_flashdata('message', 'You Must Be Logged In To View This Page');
			redirect('auth/login');
		}
          else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );
          }
           // $this->output->enable_profiler(TRUE);
       		$query_array = array(
                'plant_type' => $this->input->post('plant_type'),
                'foliage_type'  => $this->input->post('foliage_type'),
                'gpp_year' => $this->input->post('gpp_year'),
                'theme' => $this->input->post('theme'),
                'plant_height_at_10' => $this->input->post('plant_height_at_10'),
				'plant_height_min' => $this->input->post('plant_height_min'),
                'plant_width_at_10' => $this->input->post('plant_width_at_10'),
				'plant_width_min' => $this->input->post('plant_width_min'),
                'zone_low' => $this->input->post('zone_low'),
				'zone_low_max' => $this->input->post('zone_low_max'),
                'growth_habit' => $this->input->post('growth_habit'),
                'flower_time' => $this->input->post('flower_time'),
                'flower_color' => $this->input->post('flower_color'),
                'foliage_color' => $this->input->post('foliage_color'),
                'sun' => $this->input->post('sun'),
                'soil' => $this->input->post('soil'),
                'water' => $this->input->post('water'),
                'committee' => $this->input->post('committee')
                 );

             $this->load->model('crud_model');
            
            //var_dump($query_array);
            $results = $this->crud_model->admin_query($query_array,
                    $limit, $offset, $sort_by, $sort_order);

            $data['num_results'] = count($results);

            $query_results = array();
            foreach ($results as $result) {
                  $query_results[] = array(
                  'name' => display_full_botanical_name($result),
                  'common' => $result['family_common_name'],
                  'status' => $result['status'],
                  'year' => $result['gpp_year'],
                  'committee' => $result['committee'],
                  'id' => $result['id']
              );
            }
            $data['records'] = $query_results;
            $data['stats'] = count($results);

            if (!$results)
                {
                $this->session->set_flashdata('message', '<p class="flash">Sorry, no plants meet your criteria.  Please try again.</p>');
                redirect(site_url('admin/admin_search'), 'refresh');
                }
            else {
            $this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('admin/admin_template','admin/query_results',$data);
            }
        }
        
}

/* End of file admin_search.php */
/* Location: ./application/controllers/admin/admin_search.php */
