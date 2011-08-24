<?php

/**
 * futurepicks.php
 *PUBLIC
 * Show plant lists in sortable table, search for plants to display in table
 *
 * @package		Great Plant Picks
 * @subpackage	Controllers
 * @category		Controllers
 * @author		
 */

class Futurepicks extends CI_Controller {

       
        function index($sort_by = 'gpp_year', $sort_order = 'asc', $offset = 0) {

             if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login');
		}
            else {
             $data = array(
               'logged_in' => $this->ion_auth->logged_in()
               );

            // $this->output->enable_profiler(TRUE);
            $this->load->model('futurepicks_model');
           // $limit = 20;
           
            //define sortable fields
            $data['sortfields'] = array(
              'genus' => 'Plant Name',
              'plant_type' => 'Plant Type',
              'gpp_year' => 'GPP Year'
            );

            
            $results = $this->futurepicks_model->get_picks($query, $limit, $offset, $sort_by, $sort_order);
            
            $gpp_picks = array();
            foreach ($results['rows'] as $result) {
                  $gpp_picks[] = array(
                  'name' => display_full_botanical_name($result),
                  'plant_type' => $result['plant_type'],
                  'gpp_year' => $result['gpp_year'],
                  'id' => $result['id']
              );
            }
            $data['records'] = $gpp_picks;
            

            // pagination

            $this->load->library('pagination');
            $config = array();
            $config['base_url'] = site_url("professionals/futurepicks/$query/$sort_by/$sort_order");
            $config['total_rows'] = $results['records'];
            $config['per_page'] = $limit;
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['pagination'] = $this->pagination->create_links();

            $data['sort_by'] = $sort_by;
            $data['sort_order'] = $sort_order;
            
            $this->template->set('thispage','Display Lists');
            $this->template->set('title','Plant Lists | Great Plant Picks');
            $this->template->load('pros/pros_template','pros/futurepicks',$data);
                  
        }

        }

   
}

/* End of file plantlists.php */
/* Location: ./application/controllers/plantlists.php */
